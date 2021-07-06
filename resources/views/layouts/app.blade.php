<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
    <head>
       @include('partials.head')
       @include('partials.jsfiles')

    </head>
    
    <body class="font-sans antialiased">
        @if (Session::has('error'))
            <script type="text/javascript">  
                swal({
                    icon: 'error',
                    title:'Error paso algo',
                    text:"{{Session::get('error')}}",
                    type:'error'
                }).then((value) => {
                location.reload();
                }).catch(swal.noop);

            </script>
        @endif

        @if (Session::has('postExitoso'))
            <script type="text/javascript">  
                swal({
                    icon: 'success',
                    title:'post publicado',
                    text:"{{Session::get('postExitoso')}}",
                    type:'success'
                }).then((value) => {
                    location.reload();
                }).catch(swal.noop);
            </script>
        @endif
        @if (Session::has('editado'))
            <script type="text/javascript">  
                swal({
                    icon: 'success',
                    title:'post publicado',
                    text:"{{Session::get('editado')}}",
                    type:'success'
                }).then((value) => {
                    location.reload();
                }).catch(swal.noop);
            </script>
        @endif
        @if (Session::has('borrado'))
        <script type="text/javascript">  
            swal({
                icon: 'success',
                title:'tweet desoculto',
                text:"{{Session::get('borrado')}}",
                type:'success'
            }).then((value) => {
                location.reload();
            }).catch(swal.noop);
        </script>
    @endif

        
        
       
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="hidden max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            
                </div>
            </header>

            <!-- Page Content -->
            <main>
            
                @yield('content')
            </main>
        </div>
    </body>
</html>
