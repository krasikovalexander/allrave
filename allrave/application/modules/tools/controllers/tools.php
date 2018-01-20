<?php
class Tools extends MX_Controller {

    public function initcalendar()
    {
        require_once 'google-api-php-client-master/vendor/autoload.php';
        putenv('GOOGLE_APPLICATION_CREDENTIALS=allrave-calendar.json');
        $client = new Google_Client();
        $client->useApplicationDefaultCredentials();
        $client->setScopes(Google_Service_Calendar::CALENDAR);
        $service = new Google_Service_Calendar($client);

        /*$calendar = $service->calendars->get('primary');

        try {
            $service->calendars->patch('primary', array("summary"=>'Rave Luxury Transportation', "timeZone"=>'America/Chicago'));
        } catch (Exception $e) {
            echo "Exception ".$e->getMessage();
        }
        */
        /*
        try {
            $calendarListEntry = $service->calendarList->get('primary');
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
        $calendarListEntry->setTimeZone('America/Chicago');
        $calendarListEntry->setSummary('Rave Luxury Transportation');

        $notificationsSettings = $calendarListEntry->getNotificationsSettings();
        $notifications = [];
        $types = ["eventChange", "eventCancellation", "eventResponse"];
        foreach ($types as $type) {
            $notifications[] = new Google_Service_Calendar_CalendarNotification(array("method" => "email", "type" => $type));
        }

        $notificationsSettings->setNotifications($notifications);
        $calendarListEntry->setNotificationsSettings($notificationsSettings);
        $service->calendarList->update($calendarListEntry->getId(), $calendarListEntry);
        */

        $rule = new Google_Service_Calendar_AclRule();
        $scope = new Google_Service_Calendar_AclRuleScope();

        $scope->setType("user");
        $scope->setValue("610allrave@gmail.com");
        $rule->setScope($scope);
        $rule->setRole("owner");

        $service->acl->insert('primary', $rule);
        echo "done";

    }
}