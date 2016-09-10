<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class MY_Email extends CI_Email {
    
    var $imap_host      = "";       // IMAP Server.  Example: mail.earthlink.net
    var $imap_user      = "";       // IMAP User.
    var $imap_pass      = "";       // IMAP Password.
    var $imap_port      = "";       // IMAP Port. Example: 993 for secure connection.
    var $imap_mailbox   = "";       // IMAP Mailbox.  Example: INBOX
    var $imap_path      = "";       // IMAP Mailbox Path. Example: 'imap/ssl'
    var $imap_server_encoding   = "";   // IMAP server encoding
    var $_attach_id     = array();

    public function __construct($config = array())
    {
        
        parent::__construct($config);
    }
    
    
    public function set_header($header, $value) {
        $this->_set_header($header, $value);
    }

    protected function _get_message_id() {
        if (isset($this->_headers['Message-ID'])) {
            return  $this->_headers['Message-ID'];
        }
        return parent::_get_message_id();
    }

    // --------------------------------------------------------------------
    
    /**
     * Get IMAP mailbox connection stream
     * @param bool $forceConnection Initialize connection if it's not initialized
     * @return null|resource
     */
    public function get_imap_stream($force_connection = true) {
        static $imap_stream;
        if($force_connection) {
            if($imap_stream && (!is_resource($imap_stream) || !imap_ping($imap_stream))) {
                $this->disconnect();
                $imap_stream = null;
            }
            if(!$imap_stream) {
                $imap_stream = $this->_init_imap_stream();
            }
        }
        return $imap_stream;
    }
    
    // --------------------------------------------------------------------
    
    protected function _init_imap_stream() {
        $imap_stream = @imap_open($this->_full_imap_path(), $this->imap_user, $this->imap_pass);
        if(!$imap_stream) {
            throw new Exception('Connection error: ' . imap_last_error());
        }
        return $imap_stream;
    }
    
    // --------------------------------------------------------------------
    
    
    protected function _full_imap_path() {
        $full_imap_path = "{".$this->imap_host.":".$this->imap_port.$this->imap_path."}".$this->imap_mailbox;
        return $full_imap_path;
    }
    
    /**
     * Get information about the current mailbox.
     *
     * Returns the information in an object with following properties:
     *  Date - current system time formatted according to RFC2822
     *  Driver - protocol used to access this mailbox: POP3, IMAP, NNTP
     *  Mailbox - the mailbox name
     *  Nmsgs - number of mails in the mailbox
     *  Recent - number of recent mails in the mailbox
     *
     * @return stdClass
     */
    public function check_mailbox() {
        return imap_check($this->get_imap_stream());
    }
    
    // --------------------------------------------------------------------
    
    /**
     * Get information about the current mailbox.
     *
     * Returns an object with following properties:
     *  Date - last change (current datetime)
     *  Driver - driver
     *  Mailbox - name of the mailbox
     *  Nmsgs - number of messages
     *  Recent - number of recent messages
     *  Unread - number of unread messages
     *  Deleted - number of deleted messages
     *  Size - mailbox size
     *
     * @return object Object with info | FALSE on failure
     */
    public function get_mailbox_info() {
        return imap_mailboxmsginfo($this->get_imap_stream());
    }
    
    // --------------------------------------------------------------------
   
    /**
     * Get number of messages from the Mailbox.
     *
     * @return integer
     */
    public function get_num_msg() {
        return imap_num_msg($this->get_imap_stream());
    }
    
    // --------------------------------------------------------------------
    
    
    /**
     * Gets status information about the given mailbox.
     *
     * This function returns an object containing status information.
     * The object has the following properties: messages, recent, unseen, uidnext, and uidvalidity.
     *
     * @return stdClass | FALSE if the box doesn't exist
     */
    public function status_mailbox($mailbox = '') {
        return imap_status($this->get_imap_stream(), $this->imap_path.$mailbox, SA_ALL);
    }
    
    // --------------------------------------------------------------------
    
    /**
     * Close IMAP Connection
     *
     */
    protected function _disconnect() {
        $imap_stream = $this->get_imap_stream(false);
        if($imap_stream && is_resource($imap_stream)) {
            imap_close($imap_stream, CL_EXPUNGE);
        }
    }
    
    // --------------------------------------------------------------------
    
    /**
     * Marks mails listed in mailId for deletion.
     * @return bool
     */
    public function delete_mail($mail_id) {
        return imap_delete($this->get_imap_stream(), $mail_id, FT_UID);
    }
    
    // --------------------------------------------------------------------
    
    /**
     * Deletes all the mails marked for deletion by imap_delete(), imap_mail_move(), or imap_setflag_full().
     * @return bool
     */
    public function expunge_deleted_mails() {
        return imap_expunge($this->get_imap_stream());
    }
    
    // --------------------------------------------------------------------
    
    /**
     * This function performs a search on the mailbox currently opened in the given IMAP stream.
     * For example, to match all unanswered mails sent by Mom, you'd use: "UNANSWERED FROM mom".
     * Searches appear to be case insensitive. This list of criteria is from a reading of the UW
     * c-client source code and may be incomplete or inaccurate (see also RFC2060, section 6.4.4).
     *
     * @param string $criteria String, delimited by spaces, in which the following keywords are allowed. Any multi-word arguments (e.g. FROM "joey smith") must be quoted. Results will match all criteria entries.
     *    ALL - return all mails matching the rest of the criteria
     *    ANSWERED - match mails with the \\ANSWERED flag set
     *    BCC "string" - match mails with "string" in the Bcc: field
     *    BEFORE "date" - match mails with Date: before "date"
     *    BODY "string" - match mails with "string" in the body of the mail
     *    CC "string" - match mails with "string" in the Cc: field
     *    DELETED - match deleted mails
     *    FLAGGED - match mails with the \\FLAGGED (sometimes referred to as Important or Urgent) flag set
     *    FROM "string" - match mails with "string" in the From: field
     *    KEYWORD "string" - match mails with "string" as a keyword
     *    NEW - match new mails
     *    OLD - match old mails
     *    ON "date" - match mails with Date: matching "date"
     *    RECENT - match mails with the \\RECENT flag set
     *    SEEN - match mails that have been read (the \\SEEN flag is set)
     *    SINCE "date" - match mails with Date: after "date"
     *    SUBJECT "string" - match mails with "string" in the Subject:
     *    TEXT "string" - match mails with text "string"
     *    TO "string" - match mails with "string" in the To:
     *    UNANSWERED - match mails that have not been answered
     *    UNDELETED - match mails that are not deleted
     *    UNFLAGGED - match mails that are not flagged
     *    UNKEYWORD "string" - match mails that do not have the keyword "string"
     *    UNSEEN - match mails which have not been read yet
     *
     * @return array Mails ids
     */
     public function search_mailbox($criteria = 'ALL') {
        $mails_ids = imap_search($this->get_imap_stream(), $criteria, SE_UID, $this->imap_server_encoding);
        return $mails_ids ? $mails_ids : array();
     }
    
    // --------------------------------------------------------------------
    
    // --------------------------------------------------------------------
    
    /**
     * Decode Mime String
     *
     * @param $string, $charset
     * @return String
     */
    protected function decode_mime_str($string, $charset = 'utf-8') {
        $new_string = '';
        $elements = imap_mime_header_decode($string);
        for($i = 0; $i < count($elements); $i++) {
            if($elements[$i]->charset == 'default') {
                $elements[$i]->charset = 'iso-8859-1';
            }
            // php-imap fix #46 
            // $new_string .= iconv(strtoupper($elements[$i]->charset), $charset . '//IGNORE', $elements[$i]->text);
            $new_string .= mb_convert_encoding($elements[$i]->text, $charset, $elements[$i]->charset);
        }
        return $new_string;
    }
    
    // --------------------------------------------------------------------
    
    /**
     * Decode RFC String
     *
     * @param $string, $charset
     * @return String
     */
    protected function decode_rfc2231($string, $charset = 'utf-8') {
        if(preg_match("/^(.*?)'.*?'(.*?)$/", $string, $matches)) {
            $encoding = $matches[1];
            $data = $matches[2];
            if($this->isUrlEncoded($data)) {
                // php-imap fix #46 
                // $string = iconv(strtoupper($encoding), $charset . '//IGNORE', urldecode($data));
                $string = mb_convert_encoding(urldecode($data), $charset, $encoding);
            }
        }
        return $string;
    }
    
    public function list_mailboxes() {
        return imap_list($this->get_imap_stream(), $this->_full_imap_path(), "*");
    }
    

    public function get_headers() {
        return imap_headers($this->get_imap_stream());
    }

    public function overview($sequence) {
        return imap_fetch_overview($this->get_imap_stream(), $sequence);
    }

    public function create_mailbox($mailbox) {
        return imap_createmailbox($this->get_imap_stream(), imap_utf7_encode("{".$this->imap_host.":".$this->imap_port.$this->imap_path."}".$mailbox));
    }

    public function message_body($number) {
        $structure = imap_fetchstructure($this->get_imap_stream(), $number);
        $body = imap_fetchbody($this->get_imap_stream(), $number, "1");
        switch ($structure->encoding) {
            case 3:
                $body = imap_base64($body);
                break;
            case 4:
                $body = imap_qprint($body);
                break;
        }
        return $body;
    }

    public function imap_send($to, $subject, $message) {
        return imap_mail($to, $subject, $message);
    }

    public function headerinfo($number) {
        return  imap_headerinfo($this->get_imap_stream(), $number);
    }

    public function move($numbers, $mailbox) {
        return imap_mail_move ( $this->get_imap_stream(), (string) implode(',', $numbers) , $mailbox );
    }

    public function parse($id)
    {
        $decode = function($encoding, $content) {
            switch ($encoding) {
                case 3:
                    return base64_decode($content);
                case 4:
                    return imap_qprint($content);
                default:
                    return $content;
            }
        };

        if (is_resource($this->get_imap_stream()))
        {
            $result = array
            (
                'text' => null,
                'html' => null,
                'attachments' => array(),
            );

            $structure = imap_fetchstructure($this->get_imap_stream(), $id);

            if (array_key_exists('parts', $structure))
            {
                foreach ($structure->parts as $key => $part)
                {
                    if (($part->type >= 2) || (($part->ifdisposition == 1) && ($part->disposition == 'attachment')))
                    {
                        $filename = null;

                        if ($part->ifparameters == 1)
                        {
                            $total_parameters = count($part->parameters);

                            for ($i = 0; $i < $total_parameters; $i++)
                            {
                                if (($part->parameters[$i]->attribute == 'name') || ($part->parameters[$i]->attribute == 'filename'))
                                {
                                    $filename = $part->parameters[$i]->value;

                                    break;
                                }
                            }

                            if (is_null($filename))
                            {
                                if ($part->ifdparameters == 1)
                                {
                                    $total_dparameters = count($part->dparameters);

                                    for ($i = 0; $i < $total_dparameters; $i++)
                                    {
                                        if (($part->dparameters[$i]->attribute == 'name') || ($part->dparameters[$i]->attribute == 'filename'))
                                        {
                                            $filename = $part->dparameters[$i]->value;

                                            break;
                                        }
                                    }
                                }
                            }
                        }

                        $result['attachments'][] = array
                        (
                            'filename' => $filename,
                            'content' => $decode($part->encoding, imap_fetchbody($this->get_imap_stream(), $id, ($key + 1))),
                            'disposition' => $part->disposition,
                            'id' => $part->id
                        );
                    }

                    else
                    {
                        if ($part->subtype == 'PLAIN')
                        {
                            $result['text'] = $decode($part->encoding, imap_fetchbody($this->get_imap_stream(), $id, ($key + 1)));
                        }

                        else if ($part->subtype == 'HTML')
                        {
                            $result['html'] = $decode($part->encoding, imap_fetchbody($this->get_imap_stream(), $id, ($key + 1)));
                        }

                        else
                        {
                            foreach ($part->parts as $alternative_key => $alternative_part)
                            {
                                if ($alternative_part->subtype == 'PLAIN')
                                {
                                    $result['text'] = $decode($alternative_part->encoding, imap_fetchbody($this->get_imap_stream(), $id, ($key + 1) . '.' . ($alternative_key + 1)));
                                }

                                else if ($alternative_part->subtype == 'HTML')
                                {
                                    $result['html'] = $decode($alternative_part->encoding, imap_fetchbody($this->get_imap_stream(), $id, ($key + 1) . '.' . ($alternative_key + 1)));
                                }
                            }
                        }
                    }
                }
            }

            else
            {
                $result['text'] = $decode($structure->encoding, imap_body($this->get_imap_stream(), $id));
            }

            //$result['text'] = imap_qprint($result['text']);
            //$result['html'] = imap_qprint(imap_7bit($result['html']));

            return $result;
        }

        return false;
    }

        protected function _build_message()
    {
        if ($this->wordwrap === TRUE  AND  $this->mailtype != 'html')
        {
            $this->_body = $this->word_wrap($this->_body);
        }

        $this->_set_boundaries();
        $this->_write_headers();

        $hdr = ($this->_get_protocol() == 'mail') ? $this->newline : '';
        $body = '';

        switch ($this->_get_content_type())
        {
            case 'plain' :

                $hdr .= "Content-Type: text/plain; charset=" . $this->charset . $this->newline;
                $hdr .= "Content-Transfer-Encoding: " . $this->_get_encoding();

                if ($this->_get_protocol() == 'mail')
                {
                    $this->_header_str .= rtrim($hdr);
                    $this->_finalbody = $this->_body;
                }
                else
                {
                    $this->_finalbody = $hdr . $this->newline . $this->newline . $this->_body;
                }

                return;

            break;
            case 'html' :

                if ($this->send_multipart === FALSE)
                {
                    $hdr .= "Content-Type: text/html; charset=" . $this->charset . $this->newline;
                    $hdr .= "Content-Transfer-Encoding: quoted-printable";
                }
                else
                {
                    $hdr .= "Content-Type: multipart/alternative; boundary=\"" . $this->_alt_boundary . "\"" . $this->newline . $this->newline;

                    $body .= $this->_get_mime_message() . $this->newline . $this->newline;
                    $body .= "--" . $this->_alt_boundary . $this->newline;

                    $body .= "Content-Type: text/plain; charset=" . $this->charset . $this->newline;
                    $body .= "Content-Transfer-Encoding: " . $this->_get_encoding() . $this->newline . $this->newline;
                    $body .= $this->_get_alt_message() . $this->newline . $this->newline . "--" . $this->_alt_boundary . $this->newline;

                    $body .= "Content-Type: text/html; charset=" . $this->charset . $this->newline;
                    $body .= "Content-Transfer-Encoding: quoted-printable" . $this->newline . $this->newline;
                }

                $this->_finalbody = $body . $this->_prep_quoted_printable($this->_body) . $this->newline . $this->newline;


                if ($this->_get_protocol() == 'mail')
                {
                    $this->_header_str .= rtrim($hdr);
                }
                else
                {
                    $this->_finalbody = $hdr . $this->_finalbody;
                }


                if ($this->send_multipart !== FALSE)
                {
                    $this->_finalbody .= "--" . $this->_alt_boundary . "--";
                }

                return;

            break;
            case 'plain-attach' :

                $hdr .= "Content-Type: multipart/".$this->multipart."; boundary=\"" . $this->_atc_boundary."\"" . $this->newline . $this->newline;

                if ($this->_get_protocol() == 'mail')
                {
                    $this->_header_str .= rtrim($hdr);
                }

                $body .= $this->_get_mime_message() . $this->newline . $this->newline;
                $body .= "--" . $this->_atc_boundary . $this->newline;

                $body .= "Content-Type: text/plain; charset=" . $this->charset . $this->newline;
                $body .= "Content-Transfer-Encoding: " . $this->_get_encoding() . $this->newline . $this->newline;

                $body .= $this->_body . $this->newline . $this->newline;

            break;
            case 'html-attach' :

                $hdr .= "Content-Type: multipart/".$this->multipart."; boundary=\"" . $this->_atc_boundary."\"" . $this->newline . $this->newline;

                if ($this->_get_protocol() == 'mail')
                {
                    $this->_header_str .= rtrim($hdr);
                }

                $body .= $this->_get_mime_message() . $this->newline . $this->newline;
                $body .= "--" . $this->_atc_boundary . $this->newline;

                $body .= "Content-Type: multipart/alternative; boundary=\"" . $this->_alt_boundary . "\"" . $this->newline .$this->newline;
                $body .= "--" . $this->_alt_boundary . $this->newline;

                $body .= "Content-Type: text/plain; charset=" . $this->charset . $this->newline;
                $body .= "Content-Transfer-Encoding: " . $this->_get_encoding() . $this->newline . $this->newline;
                $body .= $this->_get_alt_message() . $this->newline . $this->newline . "--" . $this->_alt_boundary . $this->newline;

                $body .= "Content-Type: text/html; charset=" . $this->charset . $this->newline;
                $body .= "Content-Transfer-Encoding: quoted-printable" . $this->newline . $this->newline;

                $body .= $this->_prep_quoted_printable($this->_body) . $this->newline . $this->newline;
                $body .= "--" . $this->_alt_boundary . "--" . $this->newline . $this->newline;

            break;
        }

        $attachment = array();

        $z = 0;

        for ($i=0; $i < count($this->_attach_name); $i++)
        {
            $filename = $this->_attach_name[$i];
            $basename = basename($filename);
            $ctype = $this->_attach_type[$i];

            if ( ! file_exists($filename))
            {
                $this->_set_error_message('lang:email_attachment_missing', $filename);
                return FALSE;
            }

            $h  = "--".$this->_atc_boundary.$this->newline;
            $h .= "Content-type: ".$ctype."; ";
            $h .= "name=\"".$basename."\"".$this->newline;
            $h .= "Content-Transfer-Encoding: base64".$this->newline;

            if ($this->_attach_disp[$i] == 'inline') {
                $id = $this->_attach_id[$i];
                $h .= "Content-Disposition: inline; ";
                $h .= "filename=\"$basename\"".$this->newline;
                $h .= "Content-ID: $id".$this->newline;
            } else {
                $h .= "Content-Disposition: ".$this->_attach_disp[$i].";".$this->newline;
            }

            $attachment[$z++] = $h;
            $file = filesize($filename) +1;

            if ( ! $fp = fopen($filename, FOPEN_READ))
            {
                $this->_set_error_message('lang:email_attachment_unreadable', $filename);
                return FALSE;
            }

            $attachment[$z++] = chunk_split(base64_encode(fread($fp, $file)));
            fclose($fp);
        }

        $body .= implode($this->newline, $attachment).$this->newline."--".$this->_atc_boundary."--";


        if ($this->_get_protocol() == 'mail')
        {
            $this->_finalbody = $body;
        }
        else
        {
            $this->_finalbody = $hdr . $body;
        }

        return;
    }

    public function attachWithId($filename, $disposition, $id)
    {
        $this->_attach_name[] = $filename;
        $this->_attach_type[] = $this->_mime_types(pathinfo($filename, PATHINFO_EXTENSION));
        $this->_attach_disp[] = $disposition; 
        $this->_attach_id[]   = $id;
        return $this;
    }

    public function clear($clear_attachments = FALSE)
    {
        $this->_subject     = "";
        $this->_body        = "";
        $this->_finalbody   = "";
        $this->_header_str  = "";
        $this->_replyto_flag = FALSE;
        $this->_recipients  = array();
        $this->_cc_array    = array();
        $this->_bcc_array   = array();
        $this->_headers     = array();
        $this->_debug_msg   = array();

        $this->_set_header('User-Agent', $this->useragent);
        $this->_set_header('Date', $this->_set_date());

        if ($clear_attachments !== FALSE)
        {
            $this->_attach_name = array();
            $this->_attach_type = array();
            $this->_attach_disp = array();
            $this->_attach_id = array();
        }

        return $this;
    }
}
/* End of file MY_Email.php */