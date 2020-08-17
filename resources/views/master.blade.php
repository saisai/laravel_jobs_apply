<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>{{ $title }}</title>

		
		
    <!-- Bootstrap core CSS -->
		{!!HTML::style('assets/css/bootstrap.min.css')!!}
    

    <!-- Custom styles for this template -->
		{!!HTML::style('assets/css/jumbotron.css')!!}
    

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->    
		{!!HTML::script('assets/js/ie-emulation-modes-warning.js')!!}


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <?php /*	
			<li class="dropdown">
              <a data-toggle="dropdown" class="dropdown-toggle" href="#">Category <span class="caret"></span></a>
              <ul role="menu" class="dropdown-menu">
                <li><a href="{{ URL::to('category') }}">Add Data</a></li>
                <li><a href="{{ URL::to('list-category') }}">List</a></li>                
              </ul>
            </li>
			*/ ?>
			<li class="dropdown">
              <a data-toggle="dropdown" class="dropdown-toggle" href="{{ url('list-post') }}">Posts <span class="caret"></span></a>
              <ul role="menu" class="dropdown-menu">
                <li><a href="{{ url('post') }}">Add Data</a></li>
                <li><a href="{{ route('list-post') }}">List</a></li>                
              </ul>
            </li>  						
			<?php /*		
			<li class="dropdown">
              <a data-toggle="dropdown" class="dropdown-toggle" href="{{ url('site') }}">To Do List <span class="caret"></span></a>
              <ul role="menu" class="dropdown-menu">
                <li><a href="{{ url('todo') }}">Add Data</a></li>
                <li><a href="{{ route('list-todolist') }}">List</a></li>                
              </ul>
            </li>								
			*/ ?>			
            <li class="dropdown">
              <a aria-expanded="true" role="button" data-toggle="dropdown" class="dropdown-toggle" href="#">Thai <span class="caret"></span></a>
              <ul role="menu" class="dropdown-menu">
                <li><a href="{{URL::to('jobs-db')}}">Jobs DB</a></li>
                <li><a href="{{URL::to('jobs-thai')}}">Jobs Thai</a></li>
                <li><a href="{{URL::to('jobs-bkk')}}">Jobs Bkk</a></li>
                <li><a href="{{URL::to('jobs-topgun')}}">Jobs Top Gun</a></li>
                <li><a href="{{URL::to('jobs-thaiweb')}}">Jobthaiweb</a></li>
                <li><a href="{{URL::to('jobs-jobyescoth')}}">Jobyescoth</a></li>
                <li><a href="{{URL::to('jobs-thaijobcom')}}">Thaijobcom</a></li>
                <li><a href="{{URL::to('jobs-monstercoth')}}">Monstercoth</a></li>
				<?php /*
                <li><a href="{{URL::to('web-jobs-bangkok')}}">Web Jobs Bangkok</a></li>
				*/ ?>
              </ul>
            </li>
			<?php /*
            <li class="dropdown">
              <a aria-expanded="true" role="button" data-toggle="dropdown" class="dropdown-toggle" href="#">SG <span class="caret"></span></a>
              <ul role="menu" class="dropdown-menu">
                <li><a href="{{URL::to('jobs-db-sg')}}">Jobs Db</a></li>
                <li><a href="{{URL::to('jobs-central-sg')}}">Jobs Central</a></li>
                <li><a href="{{URL::to('jobs-monster-sg')}}">Jobs Monster</a></li>
                <li><a href="{{URL::to('jobs-st-sg')}}">Jobs St</a></li>
                <li><a href="{{URL::to('jobs-gumtree-sg')}}">Jobs Gumtree</a></li>
                <li><a href="{{URL::to('jobs-indeed-sg')}}">Jobs Indeed</a></li>
                <li><a href="{{URL::to('jobs-rapido-sg')}}">Jobs Rapido</a></li>
                <li><a href="{{URL::to('jobs-careerjet-sg')}}">Jobs Career Jet</a></li>
                <li><a href="{{URL::to('sg-jobs-on-line')}}">Jobs On Line</a></li>

              </ul>
            </li>
					
						<li class="dropdown">
              <a aria-expanded="true" role="button" data-toggle="dropdown" class="dropdown-toggle" href="#">Web Sites <span class="caret"></span></a>
              <ul role="menu" class="dropdown-menu">
                <li><a href="{{URL::to('toptal-dot-com')}}">Toptal dot com</a></li>
								<li><a href="{{URL::to('raywnderlichcom')}}">Raywnderlich dot com</a></li>

              </ul>
            </li>						
			*/ ?>				
              
		@if (Auth::check())
			<li><a href="{{URL::to('list')}}">Selected</a></li>
			<li class="dropdown">
			<a aria-expanded="true" role="button" data-toggle="dropdown" class="dropdown-toggle" href="#">File Upload<span class="caret"></span></a>
			<ul role="menu" class="dropdown-menu">
			<li><a href="{{URL::to('upload-file')}}">Upload File</a></li>
			<li><a href="{{URL::to('list-file')}}">List file</a></li>
			</ul>
			</li>
			<li class="dropdown">
			<a aria-expanded="true" role="button" data-toggle="dropdown" class="dropdown-toggle" href="#">Apply For<span class="caret"></span></a>
			<ul role="menu" class="dropdown-menu">
			<li><a href="{{URL::to('apply-for')}}">Apply For</a></li>
			<li><a href="{{URL::to('list-apply-for')}}">List Apply For</a></li>
			</ul>
			</li>

			<li><a href="{{URL::to('logout')}}">logout</a></li>
			<li ><a class="float-right">Logged in as {{{ Auth::user()->name }}} </a> </li>
		@else
			<li><a href="{{URL::to('login')}}">login</a></li>	
		@endif
						 
          </ul>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
		<div class="jumbotron">
     <div class="container">
		@include('notifications')
		@yield('main')
		</div>
		</div>
		<!--
    <div class="jumbotron">
      <div class="container">
        <h1>Hello, world!</h1>
        <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
        <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
      </div>
    </div>
		-->

    <div class="container">
      <!-- Example row of columns -->
			@yield('row')
			<!--
      <div class="row">
        <div class="col-md-4">
          <h2>Heading</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div>
        <div class="col-md-4">
          <h2>Heading</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
       </div>
        <div class="col-md-4">
          <h2>Heading</h2>
          <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div>
      </div>
			-->

      <hr>

      <footer>
        <p>&copy;{{ Date('Y') }}</p>
      </footer>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>-->
    {!!HTML::script('assets/js/jquery.min.js')!!}
		{!!HTML::script('assets/js/bootstrap.min.js')!!}
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		{!!HTML::script('assets/js/ie10-viewport-bug-workaround.js')!!}
    
    {!! HTML::script('assets/ckeditor/ckeditor.js') !!}
	{!!HTML::script('assets/js/jquery_custom.js')!!}
  </body>
</html>
