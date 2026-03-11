// === Theme Toggle ===
const btnTheme = document.getElementById("btn-theme");
const body = document.body;

if (btnTheme) {
  if (localStorage.getItem("theme") === "dark") {
    body.classList.add("dark-mode");
    btnTheme.textContent = "Mode Terang";
  }

  btnTheme.addEventListener("click", () => {
    body.classList.toggle("dark-mode");
    if (body.classList.contains("dark-mode")) {
      localStorage.setItem("theme", "dark");
      btnTheme.textContent = "Mode Terang";
    } else {
      localStorage.setItem("theme", "light");
      btnTheme.textContent = "Mode Gelap";
    }
  });
}

// === Wishlist ===
function updateWishlistCount() {
  const wishlistCount = document.getElementById("wishlist-count");
  if (!wishlistCount) return;
  const wishlistItems = JSON.parse(sessionStorage.getItem("wishlist")) || [];
  wishlistCount.textContent = wishlistItems.length;
}

function aktifkanTombolWishlist() {
  const tombolWishlist = document.querySelectorAll(".btn-wishlist");
  tombolWishlist.forEach(function (tombol) {
    tombol.addEventListener("click", function (e) {
      const cardBody = e.target.closest(".card-body");
      const namaBarang = cardBody.querySelector(".card-title").innerText;
      let wishlist = JSON.parse(sessionStorage.getItem("wishlist")) || [];
      if (!wishlist.includes(namaBarang)) {
        wishlist.push(namaBarang);
        sessionStorage.setItem("wishlist", JSON.stringify(wishlist));
        alert(namaBarang + " berhasil ditambahkan ke wishlist!");
        updateWishlistCount();
      } else {
        alert(namaBarang + " sudah ada di wishlist!");
      }
    });
  });
}

function tampilkanWhislist() {
  const daftarWishlist = document.getElementById("daftar-wishlist");
  if (!daftarWishlist) return;
  daftarWishlist.innerHTML = "";
  const wishlistItems = JSON.parse(sessionStorage.getItem("wishlist")) || [];
  if (wishlistItems.length === 0) {
    daftarWishlist.innerHTML =
      "<li class='list-group-item'>Wishlist kosong</li>";
  } else {
    wishlistItems.forEach(function (item) {
      const li = document.createElement("li");
      li.classList.add("list-group-item");
      li.textContent = item;
      daftarWishlist.appendChild(li);
    });
  }
}

function hapusWishlist() {
  if (confirm("Apakah Anda yakin ingin mengosongkan wishlist?")) {
    sessionStorage.removeItem("wishlist");
    tampilkanWhislist();
    updateWishlistCount();
  }
}

// === Tombol Beli ===
function aktifkanTombolBeli() {
  const tombolBeli = document.querySelectorAll(".btn-detail");
  tombolBeli.forEach(function (tombol) {
    tombol.addEventListener("click", function (e) {
      const cardBody = e.target.closest(".card-body");
      const stokElement = cardBody.querySelector(".stok-text");
      let stok = parseInt(stokElement.innerText.replace("Stok: ", ""));
      if (stok > 0) {
        stok--;
        stokElement.innerText = "Stok: " + stok;
        const namaBarang = cardBody.querySelector(".card-title").innerText;
        alert("Berhasil membeli " + namaBarang);
      } else {
        alert("Maaf, stok barang habis!");
        e.target.disabled = true;
        e.target.innerText = "Habis";
      }
    });
  });
}

// === Inisialisasi (index.php) ===
updateWishlistCount();
aktifkanTombolWishlist();
aktifkanTombolBeli();

// === Toggle Password (login.php) ===
function togglePassword() {
  const input = document.getElementById("password");
  if (input) {
    input.type = input.type === "password" ? "text" : "password";
  }
}