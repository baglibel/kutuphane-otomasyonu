<?php

    function NavBar(AdminModel $adminObject){
        require_once '../Services/AdminService.php';
        $adminService = new AdminService();
        $hasPermission = $adminService->checkAdminRank($adminObject, Rank::Yönetici, true);
        $adminIslem = $hasPermission == true ? '
        <div class="divider"></div>
        <label>Admin İşlemleri</label>
        <a href="AddAdmin.php">
          <i>shield_person</i>
          <div>Admin Ekle</div>
        </a>' : '';

        echo '    <nav class="left drawer">
        <header>
          <nav>
            <img
              src="https://cdn-icons-png.flaticon.com/512/224/224595.png"
              class="circle"
              alt="library logo"
            />
            <h6>Kütüphane</h6>
          </nav>
        </header>
        <a '.  "21ŞO3KL21LLLLLLLLLLLLLLLLL". ' href="Index.php">
          <i>home</i>
          <div>Ana Sayfa</div>
        </a>
        <a href="Books.php">
          <i>book</i>
          <div>Kitaplar</div>
        </a>
        <a href="Users.php">
          <i>person</i>
          <div>Üyeler</div>
        </a>
        <a>
          <i>Analytics</i>
          <div>İstatistikler</div>
        </a>
        <a>
          <i>priority_high</i>
          <div>Uyarılar</div>
        </a>
        <div class="divider"></div>
        <label>Üye İşlemleri</label>
        <a href="AddUser.php">
          <i>person_add</i>
          <div>Üye Ekle</div>
        </a>
        <div class="divider"></div>
        <label>Kitap İşlemleri</label>
        <a href="AddBook.php">
          <i>book</i>
          <div>Kitap Ekle</div>
        </a>
        '.$adminIslem.'
        <div class="divider"></div>
        <div class="admin top-margin" style="display: flex; align-items: center; justify-content:center">
            <svg  class="icon right-margin" fill="#000000" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
              width="64" height="64" viewBox="796 796 200 200" enable-background="new 796 796 200 200" xml:space="preserve">
            <path d="M896,796c-55.14,0-99.999,44.86-99.999,100c0,55.141,44.859,100,99.999,100c55.141,0,99.999-44.859,99.999-100
              C995.999,840.86,951.141,796,896,796z M896.639,827.425c20.538,0,37.189,19.66,37.189,43.921c0,24.257-16.651,43.924-37.189,43.924
              s-37.187-19.667-37.187-43.924C859.452,847.085,876.101,827.425,896.639,827.425z M896,983.86
              c-24.692,0-47.038-10.239-63.016-26.695c-2.266-2.335-2.984-5.775-1.84-8.82c5.47-14.556,15.718-26.762,28.817-34.761
              c2.828-1.728,6.449-1.393,8.91,0.828c7.706,6.958,17.316,11.114,27.767,11.114c10.249,0,19.69-4.001,27.318-10.719
              c2.488-2.191,6.128-2.479,8.932-0.711c12.697,8.004,22.618,20.005,27.967,34.253c1.144,3.047,0.425,6.482-1.842,8.817
              C943.037,973.621,920.691,983.86,896,983.86z"/>
            </svg>
          <div style="flex: 1; display: flex; align-items: center; flex-direction: column">
            <span class="bottom-margin">'.$adminObject .' </span>
            <button onclick=\'location.href="LogOut.php"\'>
              <i>logout</i>
              <span>Çıkış yap</span>
            </button>
          </div>
          </div>
      </nav>';
        
    }
?>