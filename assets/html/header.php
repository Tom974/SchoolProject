<header id="page-header">
    <div class="content-header">
        <div>
            <button type="button" class="btn btn-dual" data-toggle="layout" data-action="header_search_on">
                <i class="fa fa-fw fa-search"></i> <span class="ml-1 d-none d-sm-inline-block">Contacten Zoeken</span>
            </button>
        </div>
        <div>
            <div class="dropdown d-inline-block">
                <button type="button" class="btn btn-dual" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-fw fa-user d-sm-none"></i>
                    <span class="d-none d-sm-inline-block">Opties</span>
                    <i class="fa fa-fw fa-angle-down ml-1 d-none d-sm-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right p-0" aria-labelledby="page-header-user-dropdown">
                    <div class="bg-primary rounded-top font-w600 text-white text-center p-3">
                       Opties
                    </div>
                    <div class="p-2">
                    <a class="dropdown-item" href="http://school/home">
                            <i class="far fa-fw fa-file-alt mr-1"></i> Home
                        </a>
                        <a class="dropdown-item" href="http://school/afspraak-maken">
                            <i class="far fa-fw fa-file-alt mr-1"></i> Afspraak Maken
                        </a>
                        <a class="dropdown-item" href="http://school/afspraken">
                            <i class="far fa-fw fa-file-alt mr-1"></i> Afspraken Inzien
                        </a>
                        <a class="dropdown-item" href="http://school/gebruikers">
                            <i class="far fa-fw fa-file-alt mr-1"></i> Gebruikers Inzien
                        </a>
                        <a class="dropdown-item" href="http://school/datatable">
                            <i class="far fa-fw fa-file-alt mr-1"></i> Contacten Inzien
                        </a>
                        <div role="separator" class="dropdown-divider"></div>
                        <a class="dropdown-item" href="http://school/uitloggen.php">
                            <i class="far fa-fw fa-arrow-alt-circle-left mr-1"></i> Uitloggen
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="page-header-search" class="overlay-header bg-header-dark">
        <div class="bg-white-10">
            <div class="content-header">
                <form class="w-100" id="formsearchbox">
                    <div class="input-group search-box">
                        <div class="input-group-prepend">
                            <button type="button" class="btn btn-alt-primary" data-toggle="layout" data-action="header_search_off">
                                <i class="fa fa-fw fa-times-circle"></i>
                            </button>
                        </div>
                        <input type="text" class="form-control border-0" placeholder="Typ uw zoekopdracht in" id="page-header-search-input">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="page-header-loader" class="overlay-header bg-header-dark">
        <div class="bg-white-10">
            <div class="content-header">
                <div class="w-100 text-center">
                    <i class="fa fa-fw fa-sun fa-spin text-white"></i>
                </div>
                </div>
            </div>
    </div>
</header>
<script>
$("#formsearchbox").keypress(function (event) {
    if (event.keyCode == 13) {
        var inputVal = $('#page-header-search-input').val();
        event.preventDefault();
        jQuery(function () {
            $.ajax({
                type: "POST",
                url: "http://school/zoeken/search.php",
                data: "search="+inputVal,
                success: function(msg) {
                    console.log(msg);
                    $('.modal-body').html(msg);
                    $('#searchmodal').modal('show');
                }
            });
        });   
    }
});
    
</script>
    <div class="modal fade" id="searchmodal" tabindex="-1" role="dialog" aria-labelledby="searchmodal" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
          <h3>Zoekresultaten</h3>
            <button data-toggle="layout" data-action="header_search_off" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <div class="modal-body">
          </div>
        </div>
      </div>
    </div>