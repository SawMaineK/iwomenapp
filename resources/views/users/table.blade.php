<div class="table-responsive">
    <table id="data-table-command" class="table table-striped table-vmiddle">
	    <thead>
            <th data-column-id="id" data-visible="false">Id</th>
	    	<th data-column-id="objectId">Objectid</th>
			<th data-column-id="username">Username</th>
			<th data-column-id="password" data-visible="false">Password</th>
			<th data-column-id="email">Email</th>
			<th data-column-id="facebookId">Facebookid</th>
			<th data-column-id="isTlgTownshipExit">Istlgtownshipexit</th>
			<th data-column-id="isTestAcc">Istestacc</th>
			<th data-column-id="phoneNo">Phoneno</th>
			<th data-column-id="profileimage">Profileimage</th>
			<th data-column-id="searchName">Searchname</th>
			<th data-column-id="tlg_city_address">Tlg City Address</th>
			<th data-column-id="user_profile_img">User Profile Img</th>
			<th data-column-id="updatedAt">Updatedat</th>
			<th data-column-id="registerBODname">Registerbodname</th>
			<th data-column-id="userImgPath">Userimgpath</th>
            <th data-column-id="commands" data-formatter="commands" data-sortable="false">Action</th>
	    </thead>
	    <tbody>
	    @foreach($users as $user)
	        <tr>
	            <td>{!! $user->id !!}</td>
	            <td>{!! $user->objectId !!}</td>
				<td>{!! $user->username !!}</td>
				<td>{!! $user->password !!}</td>
				<td>{!! $user->email !!}</td>
				<td>{!! $user->facebookId !!}</td>
				<td>{!! $user->isTlgTownshipExit !!}</td>
				<td>{!! $user->isTestAcc !!}</td>
				<td>{!! $user->phoneNo !!}</td>
				<td>{!! $user->profileimage !!}</td>
				<td>{!! $user->searchName !!}</td>
				<td>{!! $user->tlg_city_address !!}</td>
				<td>{!! $user->user_profile_img !!}</td>
				<td>{!! $user->updatedAt !!}</td>
				<td>{!! $user->registerBODname !!}</td>
				<td>{!! $user->userImgPath !!}</td>
	            <td>
	                <a href="{!! route('users.edit', [$user->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
	                <a href="{!! route('users.delete', [$user->id]) !!}" onclick="return confirm('Are you sure wants to delete this User?')"><i class="glyphicon glyphicon-remove"></i></a>
	            </td>
	        </tr>
	    @endforeach
	    </tbody>
	</table>
</div>
