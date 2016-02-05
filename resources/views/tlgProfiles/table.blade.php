<table class="table">
    <thead>
    <th>Objectid</th>
			<th>Tlg Group Address</th>
			<th>Tlg Group Address Mm</th>
			<th>Tlg Group Key Activity</th>
			<th>Tlg Group Key Activity Mm</th>
			<th>Tlg Group Key Skills</th>
			<th>Tlg Group Key Skills Mm</th>
			<th>Tlg Group Lat Address</th>
			<th>Tlg Group Lng Address</th>
			<th>Tlg Group Logo</th>
			<th>Tlg Group Member No</th>
			<th>Tlg Group Name</th>
			<th>Tlg Group Name Mm</th>
			<th>Tlg Group Other Member No</th>
			<th>Tlg Leader Fb Link</th>
			<th>Tlg Leader Img</th>
			<th>Tlg Leader Name</th>
			<th>Tlg Leader Name Mm</th>
			<th>Tlg Leader Ph</th>
			<th>Tlg Leader Role</th>
			<th>Tlg Member Ph</th>
			<th>Tlg Member Ph No</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($tlgProfiles as $tlgProfile)
        <tr>
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
