<h2>New Consultation Request</h2>

<p><strong>Name:</strong> {{ $data['full_name'] }}</p>
<p><strong>Email:</strong> {{ $data['email'] }}</p>
<p><strong>Phone:</strong> {{ $data['phone'] }}</p>
<p><strong>Service:</strong> {{ $data['service'] }}</p>

@if (!empty($data['comment']))
  <p><strong>Comment:</strong></p>
  <p>{{ $data['comment'] }}</p>
@endif
