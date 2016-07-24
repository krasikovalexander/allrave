<table class="table table-striped b-t b-light text-sm hover">
			<thead>
				<tr>
					<th><?=lang('event_order_no')?></th>
					<th><?=lang('reporter')?></th>
					<th><?=lang('event_order_status')?></th>
					<th><?=lang('priority')?></th>
					<th><?=lang('date')?></th>
				</tr> </thead> <tbody>
				<?php
								if (!empty($event_orders)) {
				foreach ($event_orders as $key => $event_order) { ?>
				
				<tr class="success">
				<td><a class="text-info" href="<?=base_url()?>event_orders/view/details/<?=$event_order->event_order_id?>"><?=$event_order->issue_ref?></a></td>
				<td><?=ucfirst($event_order->username)?></td>
				<td><?=$event_order->event_order_status?></td>
				<td><?=$event_order->priority?></td>
				<td><?=strftime("%b %d, %Y", strtotime($event_order->reported_on));?></td>
				</tr>
				<?php  }} else{ ?>
				<tr>
					<td></td><td><?=lang('nothing_to_display')?></td><td></td><td></td><td></td>
				</tr>
				<?php } ?>
				
				
				
			</tbody>
		</table>