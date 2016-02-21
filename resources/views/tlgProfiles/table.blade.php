<div class="table-responsive">
	<table id="data-table-command" class="table table-striped table-vmiddle">
	    <thead>
		    <th data-column-id="id" data-visible="false">Id</th>
		    <th data-column-id="objectId" data-visible="false">Objectid</th>
			<th data-column-id="tlg_group_address">Tlg Group Address</th>
			<th data-column-id="tlg_group_address_mm">Tlg Group Address Mm</th>
			<th data-column-id="tlg_group_key_activity">Tlg Group Key Activity</th>
			<th data-column-id="tlg_group_key_activity_mm">Tlg Group Key Activity Mm</th>
			<th data-column-id="tlg_group_key_skills">Tlg Group Key Skills</th>
			<th data-column-id="tlg_group_key_skills_mm">Tlg Group Key Skills Mm</th>
			<th data-column-id="tlg_group_lat_address">Tlg Group Lat Address</th>
			<th data-column-id="tlg_group_lng_address">Tlg Group Lng Address</th>
			<th data-column-id="tlg_group_logo" data-formatter="tlg_group_logo">Tlg Group Logo</th>
			<th data-column-id="tlg_group_member_no">Tlg Group Member No</th>
			<th data-column-id="tlg_group_name">Tlg Group Name</th>
			<th data-column-id="tlg_group_name_mm">Tlg Group Name Mm</th>
			<th data-column-id="tlg_group_other_member_no">Tlg Group Other Member No</th>
			<th data-column-id="tlg_leader_fb_link">Tlg Leader Fb Link</th>
			<th data-column-id="tlg_leader_img" data-formatter="tlg_leader_img">Tlg Leader Img</th>
			<th data-column-id="tlg_leader_name">Tlg Leader Name</th>
			<th data-column-id="tlg_leader_name_mm">Tlg Leader Name Mm</th>
			<th data-column-id="tlg_leader_ph">Tlg Leader Ph</th>
			<th data-column-id="tlg_leader_role">Tlg Leader Role</th>
			<th data-column-id="tlg_member_ph">Tlg Member Ph</th>
			<th data-column-id="tlg_member_ph_no">Tlg Member Ph No</th>
		    <th data-column-id="commands" data-formatter="commands" data-sortable="false">Action</th>
	    </thead>
	    <tbody>
		    @foreach($tlgProfiles as $tlgProfile)
		        <tr>
		            <td>{!! $tlgProfile->id !!}</td>
		            <td>{!! $tlgProfile->objectId !!}</td>
					<td>{!! $tlgProfile->tlg_group_address !!}</td>
					<td>{!! $tlgProfile->tlg_group_address_mm !!}</td>
					<td>{!! $tlgProfile->tlg_group_key_activity !!}</td>
					<td>{!! $tlgProfile->tlg_group_key_activity_mm !!}</td>
					<td>{!! $tlgProfile->tlg_group_key_skills !!}</td>
					<td>{!! $tlgProfile->tlg_group_key_skills_mm !!}</td>
					<td>{!! $tlgProfile->tlg_group_lat_address !!}</td>
					<td>{!! $tlgProfile->tlg_group_lng_address !!}</td>
					<td>{!! $tlgProfile->tlg_group_logo !!}</td>
					<td>{!! $tlgProfile->tlg_group_member_no !!}</td>
					<td>{!! $tlgProfile->tlg_group_name !!}</td>
					<td>{!! $tlgProfile->tlg_group_name_mm !!}</td>
					<td>{!! $tlgProfile->tlg_group_other_member_no !!}</td>
					<td>{!! $tlgProfile->tlg_leader_fb_link !!}</td>
					<td>{!! $tlgProfile->tlg_leader_img !!}</td>
					<td>{!! $tlgProfile->tlg_leader_name !!}</td>
					<td>{!! $tlgProfile->tlg_leader_name_mm !!}</td>
					<td>{!! $tlgProfile->tlg_leader_ph !!}</td>
					<td>{!! $tlgProfile->tlg_leader_role !!}</td>
					<td>{!! $tlgProfile->tlg_member_ph !!}</td>
					<td>{!! $tlgProfile->tlg_member_ph_no !!}</td>
		            <td>
		                <a href="{!! route('tlgProfiles.edit', [$tlgProfile->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
		                <a href="{!! route('tlgProfiles.delete', [$tlgProfile->id]) !!}" onclick="return confirm('Are you sure wants to delete this TlgProfile?')"><i class="glyphicon glyphicon-remove"></i></a>
		            </td>
		        </tr>
		    @endforeach
	    </tbody>
	</table>
