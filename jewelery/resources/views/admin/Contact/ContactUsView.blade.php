@extends('admin.layout')
   
@section('content')



<table class="table">
    
    <tbody>
      <tr>
        <th class="col-2">Name</th>
        <td class="col-6">{{$view_contact_us['name'];}} </td>
      </tr>
      <tr>
        <th>Email</th>
        <td>{{$view_contact_us['email'];}}</td>
      </tr>
      <tr>
        <th>Subject</th>
        <td>{{$view_contact_us['subject'];}}</td>
      </tr>
      <tr>
        <th>Phone Number</th>
        <td>{{$view_contact_us['phone'];}}</td>
      </tr>
      <tr>
        <th>Message</th>
        <td>{{$view_contact_us['message'];}}</td>
      </tr>
      <tr>
        <th>Contac On</th>
        <td>{{$view_contact_us['created_at'];}}</td>
      </tr>
      
    </tbody>
  </table>

  <div class="md-form amber-textarea active-amber-textarea">
    <h4>Reply Of mail </h4>

  <form action="{{route('send_mail')}}" method="POST" >

      <textarea id="" name="message" class="md-textarea form-control" rows="4" cols="3"></textarea>
        <br>

        <input type="hidden" value="{{$view_contact_us['email']}}" name="email"> 

        <input type="submit" value="submit" class="btn btn-info">
  
  </form>  
  
</div>


  @endsection