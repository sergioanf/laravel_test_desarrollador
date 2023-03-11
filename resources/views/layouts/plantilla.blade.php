<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma-rtl.min.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>@yield("title")</title>

    <style>
        td{
            vertical-align: middle !important;
        }
        img {image-rendering: optimizeSpeed;image-rendering: -moz-crisp-edges;image-rendering: -webkit-optimize-contrast;image-rendering: optimize-contrast;image-rendering: pixelated; -ms-interpolation-mode: nearest-neighbor; }
        .navbar-item img{
            max-height: initial;
        }
        .section.content{
            min-height: 80vh;
            background: url("https://www.denofgeek.com/wp-content/uploads/2020/04/Rick-and-Morty-Zoom-Backgrounds-Garage-1.png?resize=768%2C432");
            background-repeat: no-repeat;
            background-size: cover;
        }
        nav.navbar{
            background-color: rgba(0, 0, 0, 0.85);
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
        }
        nav.navbar .icon i{
            padding-top: 1px;
        }
        .navbar-brand{
            width: 100%;
            display:flex;
            justify-content: space-between
        }
        .navbar-brand>div{
            margin:auto 0;
        }
        .navbar-item{
            padding: 1em 2em
        }
        h2{
            display: inline-block;
            z-index: 99999;
            position: relative;
        }
        section.content {
            padding-top: 120px;
        }
        .character-avatar img{
            width: 100%;
            height: 100%;
        }
        label{
            text-transform: capitalize;
        }
    </style>
    <!-- favicon -->
</head>
<body> 
    <nav class="navbar" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">

            <div class="navbar-start">  
            <a class="navbar-item" href="{{ route('characters.index') }}">
                <img src="/img/main-logo-450.png" alt="" width="150" >
                
                <span class="has-text-white pl-3">/ @yield("title")</span>
            </a>
          </div>
          <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
          </a>

          <div class="navbar-end">
          <div class="navbar-item">
            <div class="field is-grouped">

                <a class="button is-warning is-flex" href="/@yield('entity_name')/crear">
                   
                    <span class="m-auto">New @yield("entity_name")</span>
                    <span class="icon m-auto">
                        <i class="fa-solid fa-plus"></i>
                    </span>
                </a>
            </div>
            </div>
            </div>


        </div>
      </nav>
      
    <section class="section content">
     
        @yield("content")
    </section>

    <footer class="footer">
        <div class="content has-text-centered">
          <p>
            <strong>Rick and Morty CRUD</strong> by <a href="https://www.linkedin.com/">Sergio Clements</a>. 
            Made with <a href="https://laravel.com">Laravel</a> and 
            <a href="https://bulma.io/">Bulma</a>.
            
          </p>
        </div>
      </footer>
    <!-- script -->

    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">
    
        $('.show_confirm').click(function(event) {
            var form =  $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                title: `Are you sure you want to delete this record?`,
                text: "If you delete this, it will be gone forever.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                form.submit();
                }
            });
        });
    
    </script>
</body>
</html>