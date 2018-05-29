@extends('welcome')

@section('content')
  <div class="row row-main">
    <div class="col s12 m12 l12">
      <div class="card-panel">
        <div class="row">
          <div class="col s12 m4 l4">
            <nav class="cyan nav-breadcrumb">
              <div class="nav-wrapper">
                <div class="col s12 m12 l12">
                  <a class="breadcrumb">Data Absensi</a>
                </div>
              </div>
            </nav>
          </div>
          <div class="col s12 m8 l8">
            <div class="row right">
              <div class="col s12 m12 l12">
               <!--  <a href="{{ route('sinkronisasi') }}" class="btn waves-effect waves-light cyan tooltipped" data-position="top" data-delay="50" data-tooltip="Sinkronisasi"><i class="material-icons">sync</i></a> -->
              </div>
            </div>
          </div>
        </div>
        <div class="row margin-bottom">
          <div class="col s12 m12 l12">
            <h4>Tabel Data Absensi</h4>
          </div>
        </div>
        <div id="boaedan"></div>
      </div>
    </div>
  </div>
@endsection
@section('asset_footer')
  
  <script type="text/javascript">

  $(document).ready(function(){
    $('#boaedan').load('{{ route('ajaxSinkronisasi') }}');
  })
    setInterval(function(){
      $('#boaedan').load('{{ route('ajaxSinkronisasi') }}');
    }, 5000)
</script>

@endsection