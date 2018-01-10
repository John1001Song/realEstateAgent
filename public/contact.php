<?php include 'shared/header.php';?>
  <div class="content">
    <div class="content_resize">
      <div class="mainbar">
        <div class="article">
          <h2><span>Contact</span></h2>
          <div class="clr"></div>
          <p>联系我们</p>
        </div>
        <div class="article">
          <h2><span>Send us</span> mail</h2>
          <div class="clr"></div>
          <form action="#" method="post" id="sendemail">
            <ol>
              <li>
                <label for="name">姓名</label>
                <input id="name" name="name" class="text" />
              </li>
              <li>
                <label for="email">邮箱</label>
                <input id="email" name="email" class="text" />
              </li>
              <li>
                <label for="cellphone">手机号码</label>
                <input id="cellphone" name="cellphone" class="text" />
              </li>
              <li>
                <label for="message">您的留言</label>
                <textarea id="message" name="message" rows="8" cols="50"></textarea>
              </li>
              <li>
                <input type="image" name="imageField" id="imageField" src="../images/submit.gif" class="send" />
                <div class="clr"></div>
              </li>
            </ol>
          </form>
        </div>
    </div>
  </div>
      <?php include 'shared/footer.php';?>
