if (
  window.location.pathname.includes("/dashboard") ||
  window.location.pathname.includes("/booking")
) {
  window.copy_booking_data = (id, cat_id) => {
    let btn = document.getElementById("booking-dropdown-button" + id);
    let data = btn.dataset;
    // form
    document.getElementById("update_booking_form").action = "/booking/" + id;
    document.getElementById("delete_booking_form").action = "/booking/" + id;

    document.getElementById("prename").innerHTML = data.name;
    document.getElementById("prephone").innerHTML = data.phone;
    document.getElementById("prepayment").innerHTML = data.paymentMethod;
    document.getElementById("predate").innerHTML = data.date;
    document.getElementById("preprice").innerHTML = "Rp. " + data.pkgPrice;
    document.getElementById("preprice").innerHTML =
      "Rp. " + data.formatted_price;

    document.getElementById("prepackagename").innerHTML = data.pkgName;
    document.getElementById("precatname").innerHTML = data.pkgCatName;
    document.getElementById("status").value = data.status;
    let prestatus = document.getElementById("prestatus");
    prestatus.innerHTML = data.status;
    if (data.status.toLocaleLowerCase() == "done") {
      prestatus.classList = "badge-sm-done";
    } else if (data.status.toLocaleLowerCase() === "paid") {
      prestatus.classList = "badge-sm-paid";
    } else if (data.status.toLocaleLowerCase() === "unpaid") {
      prestatus.classList = "badge-sm-unpaid";
    } else if (data.status.toLocaleLowerCase() == "cancelled") {
      prestatus.classList = "badge-sm-cancelled";
    } else {
      prestatus.classList = "badge-sm-default";
    }

    // Fields
    document.getElementById("name").value = data.name;
    document.getElementById("payment_method").value = data.paymentMethod;
    document.getElementById("package").value = cat_id;
    document.getElementById("date").value = data.date;
    document.getElementById("prestatus").value = data.status;
    document.getElementById("phone").value = data.phone.replace(
      /[\(\)\.\-\+\,\/]/g,
      ""
    );
    return;
  };
}

if (window.location.pathname.includes("/dashboard/users")) {
  window.copy_user_data = (id) => {
    const btn = document.getElementById("user-dropdown-button" + id);
    const data = btn.dataset;

    const nameFields = document.getElementById("name");
    const emailFields = document.getElementById("email");
    const phoneFields = document.getElementById("phone");
    const addressFields = document.getElementById("address");

    document.getElementById("prename").innerHTML = data.name;
    document.getElementById("prepicture").src = "/storage/" + data.avatar;
    document.getElementById("prephone").innerHTML = data.phone;
    document.getElementById("preaddress").innerHTML = data.address;
    document.getElementById("premail").innerHTML = data.email;
    document.getElementById("old_avatar").innerHTML = data.avatar;

    document.getElementById("user_delete_form").action =
      "/dashboard/users/" + id;
    document.getElementById("user_update_form").action =
      "/dashboard/users/" + id;

    nameFields.value = data.name;
    emailFields.value = data.email;
    phoneFields.value = data.phone;
    addressFields.value = data.address;
    return;
    // const avatar = document.getElementById('avatar');
  };
}

if (window.location.pathname.includes("/dashboard/categories")) {
  window.copyData = (id, name, cat_id) => {
    document.getElementById("update_form").action =
      "/dashboard/categories/" + id;
    let delete_modal = (document.getElementById("delete_form").action =
      "/dashboard/categories/" + id);
    let update_categoryName = (document.getElementById(
      "update_categoryName"
    ).value = name);
    let delete_categoryName = (document.getElementById(
      "delete_categoryName"
    ).innerHTML = name);
    let update_category = (document.getElementById(
      "update_category"
    ).selectedIndex = cat_id);
    return;
  };
}

if (
  window.location.pathname.includes("outbound") ||
  window.location.pathname.includes("mice")
) {
  window.ViewModal = (id) => {
    let trigger_button = document.getElementById("btnSeeDetail" + id);
    let data = trigger_button.dataset;

    let package_name = data["name"];
    let package_picture = data["picture"];
    let package_category = data["category"];
    // let unit = seedetail.getAttribute('data-unit')
    let package_price = data["price"];
    let desc = data["desc"];

    document.getElementById("name_modal").innerHTML =
      package_name ?? "Nama Produk";

    document.getElementById("img_modal").src = package_picture ?? "";
    document.getElementById("category_detail").innerHTML = package_category;
    document.getElementById("price_modal").innerHTML = "Rp. " + package_price;

    document.getElementById("desc_modal").innerHTML =
      desc ?? "Deskripsi Produk";

    document.getElementById("package_id").value = id;
    document.getElementById("packageName").value = package_name;
    document.getElementById("booking_category").value = package_category;
    document.getElementById("booking_price").value = "Rp. " + package_price;
    return;
  };
}

if (window.location.pathname.includes("/dashboard/packages")) {
  window.transfer_data = (id) => {
    // Tombol
    let tombol_opsi = document.getElementById("package-dropdown-button" + id);

    // RAW untuk jaga jaga
    let rawPicture = tombol_opsi.getAttribute("data-raw-picture");
    let rawPrice = tombol_opsi.getAttribute("data-raw-price");

    // nama
    let namaDariDB = tombol_opsi.getAttribute("data-name");
    let prename = document.getElementById("pre-name");
    prename.innerHTML = namaDariDB;
    let uname = document.getElementById("update_name");
    uname.value = namaDariDB;

    // kategori (pre = preview)
    let namaKategoriDariDB = tombol_opsi.getAttribute("data-category");
    let IdKategori = tombol_opsi.getAttribute("data-cat_id");
    let precat = document.getElementById("pre-category");
    let upCat = document.getElementById("update_category");
    precat.innerHTML = namaKategoriDariDB;
    upCat.selectedIndex = IdKategori;

    // Harga
    let hargaDariDB = tombol_opsi.getAttribute("data-price");
    let preprice = document.getElementById("pre-price");
    let uprice = document.getElementById("update_price");
    preprice.innerHTML = hargaDariDB;
    uprice.value = hargaDariDB;

    // Deskripsi
    let DeskripsiDariDB = tombol_opsi.getAttribute("data-desc");
    let udesc = document.getElementById("update_desc");
    let predesc = document.getElementById("pre-desc");
    predesc.innerHTML = DeskripsiDariDB;
    udesc.value = DeskripsiDariDB;
    udesc.innerHTML = DeskripsiDariDB;

    // Picture
    let picture = tombol_opsi.getAttribute("data-picture");
    let pictureURL = tombol_opsi.getAttribute("data-picture-url");
    let prepic = document.getElementById("pre-pic");
    let oldPicture = document.getElementById("oldPicture");
    oldPicture.value = picture;
    prepic.src = pictureURL;

    // Ganti Aksi form nya
    let umodal = document.getElementById("update_modal");
    let dform = document.getElementById("delete_form");
    dform.action = "/dashboard/packages/" + id;
    umodal.action = "/dashboard/packages/" + id;
    return;
  };
}

window.booking_detail = (id) => {
  const trigger = document.getElementById("booking-dropdown-button" + id);
  const data = trigger.dataset;

  document.getElementById("delete_form_booking").action =
    "/booking/cancel/" + id;
  document.getElementById("read_user_name").innerHTML = data.name;
  document.getElementById("read_user_phone").innerHTML = data.phone;
  document.getElementById("read_payment_method").innerHTML = data.paymentMethod;
  document.getElementById("read_package_name").innerHTML = data.packageName;
  document.getElementById("read_package_category").innerHTML =
    data.packageCategory;
  document.getElementById("read_package_price").innerHTML =
    "Rp. " + data.formatted_price;
  document.getElementById("read_date").innerHTML = data.date;
  const readpkgstatus = document.getElementById("read_package_status");
  readpkgstatus.innerHTML = data.status;
  if (data.status.toLocaleLowerCase() == "done") {
    readpkgstatus.classList = "badge-sm-done";
  } else if (data.status.toLocaleLowerCase() === "paid") {
    readpkgstatus.classList = "badge-sm-paid";
  } else if (data.status.toLocaleLowerCase() === "unpaid") {
    readpkgstatus.classList = "badge-sm-unpaid";
  } else if (data.status.toLocaleLowerCase() == "cancelled") {
    readpkgstatus.classList = "badge-sm-cancelled";
  } else {
    readpkgstatus.classList = "badge-sm-default";
  }

  readpk.innerHTML = data.status;
};

window.inbox_copy = (id) => {
  document.getElementById("inbox_id").value = id;
};
