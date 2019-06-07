<?php include 'sidebar_and_header.php';?>
            <div class="cssmenu">
                <ul>
                    <li class="active"><a href="#">Contact</a></li>
                    <li><a href="userpanel.php"><i class="fa fa-home"></i> Home</a></li>
                </ul>
            </div>
            <div class="card" style="width: 567px; box-shadow: 0 8px 12px 0 rgba(0,0,0,0.5);  border-radius: 25px;">
                <div class="card-content">
                <div style="margin-left: 15px;">
                  <h5>
                    <strong>Address and Contact Details of the Head of office:<br/>
                            DIRECTORATE OF ACCOUNTS AND TREASURIES,ASSAM</strong><br/>
                  </h5>
                  <p>5th Floor, New Kar Bhawan, Ganeshguri,<br/>
                  Dispur, Guwahati, Assam-781006<br/>
                  Email: <strong style="color: blue;">director_treasury@rediffmail.com</strong> /
                  <strong style="color: blue;">assam_treasury@rediffmail.com</strong><br/>
                  <strong style="color: black;">Phone: 0361- 2232507 / 0361-2232508</strong></p>
                </div>
            </div>
          </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script>
    	$(document).find('textarea').each(function () {
      var offset = this.offsetHeight - this.clientHeight;

      $(this).on('keyup input focus', function () {
          $(this).css('height', 'auto').css('height', this.scrollHeight + offset);
        });
      });
    </script>
</body>

</html>
