@extends('layouts.master')

@section('content')

  <div class="container main-container">
    
    <div class="row">
      <div class="col-md-12">

        <h3>{{$data['type']}} #{{$data['id']}}</h3>

        @if($data['type'] === 'need')
        <div>
          <table class="table">
            <tbody>
              <tr> <td>නම</td> <td>{{$data['entry']->name}}</td> </tr>
              <tr> <td>අවශ්‍යතා</td> <td>{{$data['entry']->needs}}</td> </tr>
              <tr> <td>ලිපිනය</td> <td>{{$data['entry']->address}}</td> </tr>
              <tr> <td>නගරය</td> <td>{{$data['entry']->city}}</td> </tr>
              <tr> <td>දුරකථන අංක</td> <td>{{$data['entry']->telephone}}</td> </tr>
              <tr> <td>පිරිස</td> <td>{{$data['entry']->heads}}</td> </tr>
              <tr> <td>ඇතුල්කලේ</td> <td>{{$data['entry']->created_at}}</td> </tr>
              <tr> <td>යාවත්කාලීන කෙල්</td> <td>{{$data['entry']->updated_at}}</td> </tr>
            </tbody>
          </table>
        </div>
        @endif

        @if($data['type'] === 'donation')
        <div>
          <table class="table">
            <tbody>
              <tr> <td>නම</td> <td>{{$data['entry']->name}}</td> </tr>
              <tr> <td>ආධාරය</td> <td>{{$data['entry']->donation}}</td> </tr>
              <tr> <td>ලිපිනය</td> <td>{{$data['entry']->address}}</td> </tr>
              <tr> <td>නගරය</td> <td>{{$data['entry']->city}}</td> </tr>
              <tr> <td>දුරකථන අංක</td> <td>{{$data['entry']->telephone}}</td> </tr>
              <tr> <td>අමතර විස්තර</td> <td>{{$data['entry']->information}}</td> </tr>
              <tr> <td>ඇතුල්කලේ</td> <td>{{$data['entry']->created_at}}</td> </tr>
              <tr> <td>යාවත්කාලීන කෙල්</td> <td>{{$data['entry']->updated_at}}</td> </tr>
            </tbody>
          </table>
        </div>
        @endif

        <div class="share-buttons">
          <!-- Facebook -->
          <a
            href="http://www.facebook.com/sharer.php?u=http://reliefsupports.org/entry/{{$data['type']}}/{{$data['id']}}" onclick="return share(this)"
          >
            <img src="https://simplesharebuttons.com/images/somacro/facebook.png" alt="Facebook" />
          </a>

          <!-- Twitter -->
          <a
            href="https://twitter.com/share?url=http://reliefsupports.org/entry/{{$data['type']}}/{{$data['id']}}&amp;hashtags=FloodSL,reliefsupports,lka,{{$data['type']}}"
            onclick="return share(this)"
          >
            <img src="https://simplesharebuttons.com/images/somacro/twitter.png" alt="Twitter" />
          </a>
        </div>

      </div>
    </div>

    <script type="text/javascript">
      function share(elm) {
        window.open(
          elm.href, 
          'winname',
          'directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no,width=700,height=350');
        return false; 
      }
    </script>
  </div><!-- /.container -->

@endsection
