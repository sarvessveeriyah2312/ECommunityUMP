<footer class="main-footer">
  <strong>&copy;{{ date('Y') }} ECommunityUMP</strong>
  All rights reserved.
  <div class="float-right d-none d-sm-inline-block">
    <b>System Time:</b> 
    <span id="current-time">{{ date('Y-m-d H:i:s') }}</span>
  </div>
</footer>
<!-- ... Rest of your HTML ... -->

<script>
  function updateCurrentTime() {
      const currentTimeElement = document.getElementById('current-time');
      const now = new Date();
      const formattedTime = now.toISOString().slice(0, 19).replace("T", " "); // Format: 'YYYY-MM-DD HH:mm:ss'
      currentTimeElement.textContent = formattedTime;
  }

  // Update the current time every second
  setInterval(updateCurrentTime, 1000);
  
  // Initial call to update the time immediately after the page loads
  updateCurrentTime();
</script>
