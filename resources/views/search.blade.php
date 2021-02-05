
<div class="container">
              <form method="post" action="{{route('searchFunctionality')}}">
                     @csrf
              <div class="row">
                <div class="col-lg-6 mb-4" >
                        <input type="text" name="name" placeholder="Search Name" value="{{request('name')}}"  />                           
                </div> 
                <div class="col-lg-6">
                <input type="text" name="lastname" placeholder="Search Last-Name" value="{{request('lastname')}}"   /> 
                </div>   
               </div> 

               <div class="row">
                <div class="col-lg-6">
                        <input type="email" name="email" placeholder="Search Email" value="{{request('email')}}"  />                           
                </div>  
                 <div class="col-lg-6">
                <select name="role_id" style="width:185px;height:30px">
                <option selected value="">Please Select Role</option>
                @foreach (App\Role::getRolesListBackend() as $key=> $value)
                <option value="{{$key}}" <?= (request('role_id') == $key) ? "selected='selected'": " "  ?>>{{$value}}</option>
                @endforeach
                </select> 
                </div> 
               </div>
             
              <div class="form-group">
              <button type="submit" class="btn btn-primary mt-4">search</button>
              </div>
             </form> 
</div> 