@extends('layouts.app')

@section('title', 'Messages')


@section('style')

<style>
    .container {
  border: 2px solid #dedede;
  background-color: #f1f1f1;
  border-radius: 5px;
  padding: 10px;
  margin: 10px 0;
}

/* Darker chat container */
.darker {
  border-color: #ccc;
  background-color: #ddd;
}

/* Clear floats */
.container::after {
  content: "";
  clear: both;
  display: table;
}

/* Style images */
.container img {
  float: left;
  max-width: 60px;
  width: 100%;
  margin-right: 20px;
  border-radius: 50%;
}

/* Style the right image */
.container img.right {
  float: right;
  margin-left: 20px;
  margin-right:0;
}

/* Style time text */
.time-right {
  float: right;
  color: #aaa;
}

/* Style time text */
.time-left {
  float: left;
  color: #999;
}
</style>

@endsection



@section('content')
    @foreach($allRecus as $recu)
      <div class="container">
        <img src="https://cdn-icons-png.flaticon.com/128/1077/1077114.png" alt="User" style="width:auto; max-height:50px">
        <p>{{$recu->contenu}}</p>
        <span class="time-right">{{ date_format($recu->created_at, 'd-m-Y H:i:s')}}</span>
    </div>
        
    @endforeach
@foreach($allEnvoyes as $envoye)
     <div class="container darker">
        <img src="https://cdn-icons-png.flaticon.com/128/1077/1077114.png" alt="User" style="width:auto; max-height:50px">
        <p>{{$envoye->contenu}}</p>
        <span class="time-right">{{ date_format($envoye->created_at, 'd-m-Y H:i:s')}}</span>
    </div>
@endforeach
   <div style="padding: 5px">

        <form method="POST" action="{{ route('response') }}">
            @csrf
            <div style="width: 50%">
                <div style="display: flex; flex-direction:column; width:100%">
                    <input name="contenu" placeholder="Repondre" id="" cols="5" rows="2"/>
                </div>
                <div style="width: 100%">
                    <button style="width: 100%; display:flex; justify-content:center; margin:10px 0" type="submit">
                        <strong>Envoyer une reponse</strong>
                    </button>
                </div>
            </div>
        </form>
    </div>

@endsection
