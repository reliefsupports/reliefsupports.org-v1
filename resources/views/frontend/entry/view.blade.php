@extends('layouts.master')

@section('content')

<!-- [TODO] Will need to remove this. -->
<style type="text/css">
    .share-buttons img {
        width: 35px;
        padding: 5px;
        border: 0;
        box-shadow: 0;
        display: inline;
    }
</style>

  <div class="container main-container">
    
    <div class="row">
      <div class="col-md-12">

      <?php var_dump($data); ?>

        <h3>{{$data['type']}} #{{$data['id']}}</h3>

        <div>
          <table class="table">
            <tbody>
              <tr> <td>නම</td> <td>Kaushalya Weragoda ( Staff member, Bulatsinhala Divisional secretariat )</td> </tr>
              <tr> <td>අවශ්‍යතා</td> <td>බුලත්සිංහල ප්‍රදේශයේ ගංවතුරින් විපතට පත් වූ ජනතාව සඳහා වියලි ආහාර ද්‍රව්‍ය , සන්නීපාරක්ෂක ද්‍රව්‍ය, කුඩා දරුවන් සඳහා අවශ්‍ය ද්‍රව්‍ය, පැනඩෝල් සිරප් ඇතුළු අනෙකුත් බෙහෙත් වර්ග ඉතා කඩිනමින් අවශ්‍ය වී ඇත. කරුණාකර බුලත්සිංහල ප්‍රාදේශීය ලේකම් කාර්යාලය සම්බන්ද කරගැනීම ඉතා වැදගත් වේ.</td> </tr>
              <tr> <td>ලිපිනය</td> <td>ප්‍රාදේශීය ලේකම් කාර්යාලය , බුලත්සිංහල</td> </tr>
              <tr> <td>නගරය</td> <td>බුලත්සිංහල</td> </tr>
              <tr> <td>දුරකථන අංක</td> <td>0711124749</td> </tr>
              <tr> <td>පිරිස</td> <td>4000</td> </tr>
              <tr> <td>ඇතුල්කලේ</td> <td>2017-05-30 19:56:16</td> </tr>
            </tbody>
          </table>
        </div>

        <div class="share-buttons">
          <!-- Facebook -->
          <a href="http://www.facebook.com/sharer.php?u=https://simplesharebuttons.com" onclick="return share(this)">
              <img src="https://simplesharebuttons.com/images/somacro/facebook.png" alt="Facebook" />
          </a>

          <!-- Twitter -->
          <a href="https://twitter.com/share?url=https://simplesharebuttons.com&amp;text=Simple%20Share%20Buttons&amp;hashtags=simplesharebuttons" onclick="return share(this)">
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
