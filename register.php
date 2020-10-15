<?php include 'layoutRes/header.php'; ?>
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="p-5" style="width:100%">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                  </div>
                  <form class="user" method="post">
                  <div class="form-group">
                      <input type="email" name="email" class="form-control form-control-user"   placeholder="Enter Email">
                    </div>
                    <div class="form-group">
                      <input type="text" name="username" class="form-control form-control-user"   placeholder="Username">
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control form-control-user"  placeholder="Password">
                    </div>
                    
                    <a href="login.html" class="btn btn-primary btn-user btn-block">
                  Register Account
                </a>
                  
                </div>
              
            </div>

<?php include 'layoutRes/footer.php'; ?>           