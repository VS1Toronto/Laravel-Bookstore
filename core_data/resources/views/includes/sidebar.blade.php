@section('sidebar')

<div class="sidebar">
    <!-- This is necessary or the     <p>This is appended to the sidebar</p>     will not show in the     home view -->
    <!-- it won't show without this because the     @parent     in the home.blade view will override it -->
    <!-- -->
    @show           
</div>