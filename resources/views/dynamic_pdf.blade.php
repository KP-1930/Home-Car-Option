<div class="table-responsive">
    <table class="table table-striped table-bordered">
     <thead>
      <tr>
       <th>ID</th>
       <th>Name</th>
       <th>LastName</th>
       <th>Email</th>
       <th>Role</th>
      </tr>
     </thead>
     <tbody>
     @foreach($customer_data as $customer)
      <tr>
       <td>{{ $customer->id }}</td>
       <td>{{ $customer->name }}</td>
       <td>{{ $customer->lastname }}</td>
       <td>{{ $customer->email }}</td>
       <td>{{ $customer->roles['name'] }}</td>
      </tr>
     @endforeach
     </tbody>
    </table>