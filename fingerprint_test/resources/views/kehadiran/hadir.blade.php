@extends('welcome')
@section('content')
<div id="content"><!--content-->
      <div class="tabs-wrapper text-center"><!--tabwrapper-->
        <div class="panel box-shadow-none text-left content-header">
          <div class="panel-body" style="padding-bottom:0px">
            <div class="col-md-12">
              <h3 class="animated fadeInLeft">Data Absen</h3>
              <p class="animated fadeInDown">Fingerprint <span class="fa-angle-right fa"></span> Data Absensi
            </div>

          </div>
        </div>
        <div><!-- col tab content-->
          <div role="tabpanel" class="tab-pane fade active in" id="tabs-area-demo" aria-labelledby="tabs1"><!--tabpanel demo-->
            <div class="col-md-12">
                        <div class="col-md-12 tabs-area">
                          <div class="liner"></div>
                      <div class="tab-content tab-content-v5">
                        <div class="tab-pane fade in active" id="tabs-demo6-area1">
                <div class="panel">
                <div class="panel-heading"><h3>Data Sudah Hadir</h3>
                      </div>
                <div class="panel-body">
                  <div class="responsive-table">
                    <div id="loading"><p><span class="fa fa-spin fa-spinner"></span> Sedang Memuat Data......</p></div>
                    <div id="boaedan"></div>
                  </div>
                </div>
                </div><!--panel-->
                        </div><!--tab pane 1-->
                        <div class="clearfix"></div>
                      </div>
                        </div>
                    </div><!--col md12-->
          </div><!--end tabpanel demo-->
        </div><!--end col tab content-->
      </div><!--endtabwrapper-->
    </div><!--endcontent-->
  </div><!--endcontainer-->
@endsection
@section('asset_footer')
<script type="text/javascript">
     $(document).ready(function()
    {
        $.ajaxSetup(
        {
            cache: false,
            beforeSend: function() {
                $('#boaedan').hide();
                $('#loading').show();
            },
            complete: function() {
                $('#loading').hide();
                $('#boaedan').show();
            },
            success: function() {
                $('#loading').hide();
                $('#boaedan').show();
            }
        });
    });
  $(document).ready(function(){
    $('#boaedan').load('{{ route('ajaxSinkronisasi') }}');
  })
    setInterval(function(){
      $('#boaedan').load('{{ route('ajaxSinkronisasi') }}');
    }, 120000)
</script>
@endsection