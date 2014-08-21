            <!-- INICIO DEL NAV -->       
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="{{ route('index') }}">Horizontala</a>

                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse navbar-ex1-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ trans('commonTexts.about_us') }}<b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a data-toggle="modal" href="#what">{{ trans('commonTexts.who') }}</a></li>
                                    <li><a data-toggle="modal" href="#how">{{ trans('commonTexts.what') }}</a></li>
                                    <li><a data-toggle="modal" href="#find">{{ trans('commonTexts.find') }}</a></li>
                                    <li><a data-toggle="modal" href="#notfind">{{ trans('commonTexts.unfind') }}</a></li>
                                    <li><a data-toggle="modal" href="#about">{{ trans('commonTexts.how') }}</a></li>
                                    <li><a data-toggle="modal" href="#help">{{ trans('commonTexts.support') }}</a></li>
                                </ul>
                            </li>


                            <li><a href="">Blog</a></li>
                            <li><a href="">{{ trans('commonTexts.links') }}</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ trans('commonTexts.language') }}<b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ Request::url() }}?lang=es">ES</a></li>
                                    <li><a href="{{ Request::url() }}?lang=en">EN</a></li>
                                </ul>
                            </li>

                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container -->
            </nav>


            <!-- FIN DEL NAV -->