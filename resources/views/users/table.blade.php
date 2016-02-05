<div class="table-responsive">
	<table class="table">
	    <thead>
	    <th>Objectid</th>
				<th>Username</th>
				<th>Password</th>
				<th>Email</th>
				<th>Facebookid</th>
				<th>Istlgtownshipexit</th>
				<th>Istestacc</th>
				<th>Phoneno</th>
				<th>Profileimage</th>
				<th>Searchname</th>
				<th>Tlg City Address</th>
				<th>User Profile Img</th>
				<th>Updatedat</th>
				<th>Registerbodname</th>
				<th>Userimgpath</th>
	    <th width="50px">Action</th>
	    </thead>
	    <tbody>
	    @foreach($users as $user)
	        <tr>
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
