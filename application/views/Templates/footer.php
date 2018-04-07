</div>
<!--===================================================-->
<!--END CONTENT CONTAINER-->

<?php echo $this->MMenu->ListarModalConfiguracao(); ?>
<?php
$user = $this->ion_auth->user()->row();
?>
<!--ASIDE-->
<!--===================================================-->
<aside id="aside-container">
    <div id="aside">
        <div class="nano">
            <div class="nano-content">

                <!--Nav tabs-->
                <!--================================-->
                <ul class="nav nav-tabs nav-justified">
                    <li class="active">
                        <a href="#demo-asd-tab-1" data-toggle="tab">
                            <i class="demo-pli-speech-bubble-7"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#demo-asd-tab-2" data-toggle="tab">
                            <i class="demo-pli-information icon-fw"></i> Report
                        </a>
                    </li>
                    <li>
                        <a href="#demo-asd-tab-3" data-toggle="tab">
                            <i class="demo-pli-wrench icon-fw"></i> Settings
                        </a>
                    </li>
                </ul>
                <!--================================-->
                <!--End nav tabs-->



                <!-- Tabs Content -->
                <!--================================-->
                <div class="tab-content">

                    <!--First tab (Contact list)-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <div class="tab-pane fade in active" id="demo-asd-tab-1">
                        <p class="pad-hor mar-top text-semibold text-main">
                            <span class="pull-right badge badge-warning">3</span> Family
                        </p>

                        <!--Family-->
                        <div class="list-group bg-trans">
                            <a href="#" class="list-group-item">
                                <div class="media-left pos-rel">
                                    <img class="img-circle img-xs" src="<?php base_url(); ?>assets/img/profile-photos/2.png" alt="Profile Picture">
                                    <i class="badge badge-success badge-stat badge-icon pull-left"></i>
                                </div>
                                <div class="media-body">
                                    <p class="mar-no">Stephen Tran</p>
                                    <small class="text-muted">Availabe</small>
                                </div>
                            </a>
                            <a href="#" class="list-group-item">
                                <div class="media-left pos-rel">
                                    <img class="img-circle img-xs" src="<?php base_url(); ?>assets/img/profile-photos/7.png" alt="Profile Picture">
                                </div>
                                <div class="media-body">
                                    <p class="mar-no">Brittany Meyer</p>
                                    <small class="text-muted">I think so</small>
                                </div>
                            </a>
                            <a href="#" class="list-group-item">
                                <div class="media-left pos-rel">
                                    <img class="img-circle img-xs" src="<?php base_url(); ?>assets/img/profile-photos/1.png" alt="Profile Picture">
                                    <i class="badge badge-info badge-stat badge-icon pull-left"></i>
                                </div>
                                <div class="media-body">
                                    <p class="mar-no">Jack George</p>
                                    <small class="text-muted">Last Seen 2 hours ago</small>
                                </div>
                            </a>
                            <a href="#" class="list-group-item">
                                <div class="media-left pos-rel">
                                    <img class="img-circle img-xs" src="<?php base_url(); ?>assets/img/profile-photos/4.png" alt="Profile Picture">
                                </div>
                                <div class="media-body">
                                    <p class="mar-no">Donald Brown</p>
                                    <small class="text-muted">Lorem ipsum dolor sit amet.</small>
                                </div>
                            </a>
                            <a href="#" class="list-group-item">
                                <div class="media-left pos-rel">
                                    <img class="img-circle img-xs" src="<?php base_url(); ?>assets/img/profile-photos/8.png" alt="Profile Picture">
                                    <i class="badge badge-warning badge-stat badge-icon pull-left"></i>
                                </div>
                                <div class="media-body">
                                    <p class="mar-no">Betty Murphy</p>
                                    <small class="text-muted">Idle</small>
                                </div>
                            </a>
                            <a href="#" class="list-group-item">
                                <div class="media-left pos-rel">
                                    <img class="img-circle img-xs" src="<?php base_url(); ?>assets/img/profile-photos/9.png" alt="Profile Picture">
                                    <i class="badge badge-danger badge-stat badge-icon pull-left"></i>
                                </div>
                                <div class="media-body">
                                    <p class="mar-no">Samantha Reid</p>
                                    <small class="text-muted">Offline</small>
                                </div>
                            </a>
                        </div>

                        <hr>
                        <p class="pad-hor text-semibold text-main">
                            <span class="pull-right badge badge-success">Offline</span> Friends
                        </p>

                        <!--Works-->
                        <div class="list-group bg-trans">
                            <a href="#" class="list-group-item">
                                <span class="badge badge-purple badge-icon badge-fw pull-left"></span> Joey K. Greyson
                            </a>
                            <a href="#" class="list-group-item">
                                <span class="badge badge-info badge-icon badge-fw pull-left"></span> Andrea Branden
                            </a>
                            <a href="#" class="list-group-item">
                                <span class="badge badge-success badge-icon badge-fw pull-left"></span> Johny Juan
                            </a>
                            <a href="#" class="list-group-item">
                                <span class="badge badge-danger badge-icon badge-fw pull-left"></span> Susan Sun
                            </a>
                        </div>


                        <hr>
                        <p class="pad-hor mar-top text-semibold text-main">News</p>

                        <div class="pad-hor">
                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetuer
                                <a data-title="45%" class="add-tooltip text-semibold" href="#">adipiscing elit</a>, sed diam nonummy nibh. Lorem ipsum dolor sit amet.
                            </p>
                            <small class="text-muted"><em>Last Update : Des 12, 2014</em></small>
                        </div>


                    </div>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End first tab (Contact list)-->


                    <!--Second tab (Custom layout)-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <div class="tab-pane fade" id="demo-asd-tab-2">

                        <!--Monthly billing-->
                        <div class="pad-all">
                            <p class="text-semibold text-main">Billing &amp; reports</p>
                            <p class="text-muted">Get <strong>$5.00</strong> off your next bill by making sure your full payment reaches us before August 5, 2016.</p>
                        </div>
                        <hr class="new-section-xs">
                        <div class="pad-all">
                            <span class="text-semibold text-main">Amount Due On</span>
                            <p class="text-muted text-sm">August 17, 2016</p>
                            <p class="text-2x text-thin text-main">$83.09</p>
                            <button class="btn btn-block btn-success mar-top">Pay Now</button>
                        </div>


                        <hr>

                        <p class="pad-hor text-semibold text-main">Additional Actions</p>

                        <!--Simple Menu-->
                        <div class="list-group bg-trans">
                            <a href="#" class="list-group-item"><i class="demo-pli-information icon-lg icon-fw"></i> Service Information</a>
                            <a href="#" class="list-group-item"><i class="demo-pli-mine icon-lg icon-fw"></i> Usage Profile</a>
                            <a href="#" class="list-group-item"><span class="label label-info pull-right">New</span><i class="demo-pli-credit-card-2 icon-lg icon-fw"></i> Payment Options</a>
                            <a href="#" class="list-group-item"><i class="demo-pli-support icon-lg icon-fw"></i> Message Center</a>
                        </div>


                        <hr>

                        <div class="text-center">
                            <div><i class="demo-pli-old-telephone icon-3x"></i></div>
                            Questions?
                            <p class="text-lg text-semibold text-main"> (415) 234-53454 </p>
                            <small><em>We are here 24/7</em></small>
                        </div>
                    </div>
                    <!--End second tab (Custom layout)-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->


                    <!--Third tab (Settings)-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <div class="tab-pane fade" id="demo-asd-tab-3">
                        <ul class="list-group bg-trans">
                            <li class="pad-top list-header">
                                <p class="text-semibold text-main mar-no">Account Settings</p>
                            </li>
                            <li class="list-group-item">
                                <div class="pull-right">
                                    <input class="toggle-switch" id="demo-switch-1" type="checkbox" checked>
                                    <label for="demo-switch-1"></label>
                                </div>
                                <p class="mar-no">Show my personal status</p>
                                <small class="text-muted">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</small>
                            </li>
                            <li class="list-group-item">
                                <div class="pull-right">
                                    <input class="toggle-switch" id="demo-switch-2" type="checkbox" checked>
                                    <label for="demo-switch-2"></label>
                                </div>
                                <p class="mar-no">Show offline contact</p>
                                <small class="text-muted">Aenean commodo ligula eget dolor. Aenean massa.</small>
                            </li>
                            <li class="list-group-item">
                                <div class="pull-right">
                                    <input class="toggle-switch" id="demo-switch-3" type="checkbox">
                                    <label for="demo-switch-3"></label>
                                </div>
                                <p class="mar-no">Invisible mode </p>
                                <small class="text-muted">Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. </small>
                            </li>
                        </ul>


                        <hr>

                        <ul class="list-group pad-btm bg-trans">
                            <li class="list-header"><p class="text-semibold text-main mar-no">Public Settings</p></li>
                            <li class="list-group-item">
                                <div class="pull-right">
                                    <input class="toggle-switch" id="demo-switch-4" type="checkbox" checked>
                                    <label for="demo-switch-4"></label>
                                </div>
                                Online status
                            </li>
                            <li class="list-group-item">
                                <div class="pull-right">
                                    <input class="toggle-switch" id="demo-switch-5" type="checkbox" checked>
                                    <label for="demo-switch-5"></label>
                                </div>
                                Show offline contact
                            </li>
                            <li class="list-group-item">
                                <div class="pull-right">
                                    <input class="toggle-switch" id="demo-switch-6" type="checkbox" checked>
                                    <label for="demo-switch-6"></label>
                                </div>
                                Show my device icon
                            </li>
                        </ul>



                        <hr>

                        <p class="pad-hor text-semibold text-main mar-no">Task Progress</p>
                        <div class="pad-all">
                            <p>Upgrade Progress</p>
                            <div class="progress progress-sm">
                                <div class="progress-bar progress-bar-success" style="width: 15%;"><span class="sr-only">15%</span></div>
                            </div>
                            <small class="text-muted">15% Completed</small>
                        </div>
                        <div class="pad-hor">
                            <p>Database</p>
                            <div class="progress progress-sm">
                                <div class="progress-bar progress-bar-danger" style="width: 75%;"><span class="sr-only">75%</span></div>
                            </div>
                            <small class="text-muted">17/23 Database</small>
                        </div>

                    </div>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--Third tab (Settings)-->

                </div>
            </div>
        </div>
    </div>
</aside>
<!--===================================================-->
<!--END ASIDE-->


<!--MAIN NAVIGATION-->
<!--===================================================-->
<nav id="mainnav-container">
    <div id="mainnav">

        <!--Menu-->
        <!--================================-->
        <div id="mainnav-menu-wrap">
            <div class="nano">
                <div class="nano-content">

                    <!--Profile Widget-->
                    <!--================================-->
                    <div id="mainnav-profile" class="mainnav-profile">
                        <div class="profile-wrap">
                            <div class="pad-btm">
                                <span class="label label-success pull-right"><?php echo $user->COMPANY; ?></span>
                                <img class="img-circle img-sm img-border" src="<?php echo base_url(); ?>assets/img/profile-photos/1.png" alt="Profile Picture">
                            </div>
                            <a href="#profile-nav" class="box-block" data-toggle="collapse" aria-expanded="false">
                                            <span class="pull-right dropdown-toggle">
                                                <i class="dropdown-caret"></i>
                                            </span>
                                <p class="mnp-name"><?php echo $user->FIRST_NAME.' '.$user->LAST_NAME; ?></p>
                                <span class="mnp-desc"><?php echo $user->EMAIL; ?></span>
                            </a>
                        </div>
                        <div id="profile-nav" class="collapse list-group bg-trans">
                            <a href="#" class="list-group-item">
                                <i class="demo-pli-male icon-lg icon-fw"></i> View Profile
                            </a>
                            <a href="#" class="list-group-item">
                                <i class="demo-pli-gear icon-lg icon-fw"></i> Settings
                            </a>
                            <a href="#" class="list-group-item">
                                <i class="demo-pli-information icon-lg icon-fw"></i> Help
                            </a>
                            <a href="#" class="list-group-item">
                                <i class="demo-pli-unlock icon-lg icon-fw"></i> Logout
                            </a>
                        </div>
                    </div>


                    <!--Shortcut buttons-->
                    <!--================================-->
                    <div id="mainnav-shortcut">
                        <ul class="list-unstyled">
                            <li class="col-xs-3" data-content="My Profile">
                                <a class="shortcut-grid" href="#">
                                    <i class="demo-psi-male"></i>
                                </a>
                            </li>
                            <li class="col-xs-3" data-content="Messages">
                                <a class="shortcut-grid" href="#">
                                    <i class="demo-psi-speech-bubble-3"></i>
                                </a>
                            </li>
                            <li class="col-xs-3" data-content="Activity">
                                <a class="shortcut-grid" href="#">
                                    <i class="demo-psi-thunder"></i>
                                </a>
                            </li>
                            <li class="col-xs-3" data-content="Lock Screen">
                                <a class="shortcut-grid" href="#">
                                    <i class="demo-psi-lock-2"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!--================================-->
                    <!--End shortcut buttons-->


                    <ul id="mainnav-menu" class="list-group">

                        <li class="list-header">Dashboards</li>
                        <?php echo $this->MMenu->ListarMenuDashboard(); ?>
                        <li class="list-divider"></li>
                        <li class="list-header">Pesquisas</li>
                        <?php echo $this->MMenu->ListarMenuModulo(); ?>
                        <li class="list-divider"></li>
                        <li class="list-header">Configuração</li>
                        <?php echo $this->MMenu->ListarMenuConfiguracao(); ?>
                    </ul>

                </div>
            </div>
        </div>
        <!--================================-->
        <!--End menu-->

    </div>
</nav>
<!--===================================================-->
<!--END MAIN NAVIGATION-->
</div>
<script>
$(window).on('load', function() {


    // DATA TABLES
    // =================================================================
    // Require Data Tables
    // -----------------------------------------------------------------
    // http://www.datatables.net/
    // =================================================================

    $.fn.DataTable.ext.pager.numbers_length = 5;


    // Basic Data Tables with responsive plugin
    // -----------------------------------------------------------------
    $('#demo-dt-basic').dataTable( {
        "responsive": true,
        "language": {
            "paginate": {
              "previous": '<i class="demo-psi-arrow-left"></i>',
              "next": '<i class="demo-psi-arrow-right"></i>'
            }
        }
    } );





    // Row selection (single row)
    // -----------------------------------------------------------------
    var rowSelection = $('#demo-dt-selection').DataTable({
        "responsive": true,
        "language": {
            "paginate": {
              "previous": '<i class="demo-psi-arrow-left"></i>',
              "next": '<i class="demo-psi-arrow-right"></i>'
            }
        }
    });

    $('#demo-dt-selection').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            rowSelection.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    } );






    // Row selection and deletion (multiple rows)
    // -----------------------------------------------------------------
    var rowDeletion = $('#demo-dt-delete').DataTable({
        "responsive": true,
        "language": {
            "paginate": {
              "previous": '<i class="demo-psi-arrow-left"></i>',
              "next": '<i class="demo-psi-arrow-right"></i>'
            }
        },
        "dom": '<"toolbar">frtip'
    });
    $('#demo-custom-toolbar').appendTo($("div.toolbar"));

    $('#demo-dt-delete tbody').on( 'click', 'tr', function () {
        $(this).toggleClass('selected');
    } );

    $('#demo-dt-delete-btn').click( function () {
        rowDeletion.row('.selected').remove().draw( false );
    } );






    // Add Row
    // -----------------------------------------------------------------
    var t = $('#demo-dt-addrow').DataTable({
        "responsive": true,
        "language": {
            "paginate": {
              "previous": '<i class="demo-psi-arrow-left"></i>',
              "next": '<i class="demo-psi-arrow-right"></i>'
            }
        },
        "dom": '<"newtoolbar">frtip'
    });
    $('#demo-custom-toolbar2').appendTo($("div.newtoolbar"));

    $('#demo-dt-addrow-btn').on( 'click', function () {
        t.row.add( [
            'Adam Doe',
            'New Row',
            'New Row',
            nifty.randomInt(1,100),
            '2015/10/15',
            '$' + nifty.randomInt(1,100) +',000'
        ] ).draw();
    } );


});
</script>
<footer id="footer">

    <!-- Visible when footer positions are fixed -->
    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <div class="show-fixed pull-right">
        You have <a href="#" class="text-bold text-main"><span class="label label-danger">3</span> pending action.</a>
    </div>



    <!-- Visible when footer positions are static -->
    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <div class="hide-fixed pull-right pad-rgt">
        14GB of <strong>512GB</strong> Free.
    </div>



    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <!-- Remove the class "show-fixed" and "hide-fixed" to make the content always appears. -->
    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

    <p class="pad-lft">&#0169; 2016 Your Company</p>
</footer>
<button class="scroll-top btn">
    <i class="pci-chevron chevron-up"></i>
</button>
</div>
</body>
</html>
