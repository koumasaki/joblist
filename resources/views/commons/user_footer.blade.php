  <footer class="main-footer fs11">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      powered by feedjob
    </div>
    <!-- Default to the left -->
    @if (Auth::check())
    Copyright &copy; {{ Auth::user()->copyright }} All rights reserved.
    @endif
  </footer>
