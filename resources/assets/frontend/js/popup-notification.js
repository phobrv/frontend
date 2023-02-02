
setInterval(function(){ hienthi() }, 11000);

var danhsachso = "032, 033, 034, 035, 036, 037, 038, 039, 070, 079, 077, 076, 078, 083, 084, 085, 081, 082, 090, 091, 092, 093, 094, 096, 097, 098, 059, 056, 058";
var  danhsachdiachi= "An Giang, Bà Rịa - Vũng Tàu, Bắc Giang, Bắc Kạn, Bạc Liêu, Bắc Ninh, Bến Tre, Bình Định, Bình Dương, Bình Phước, Bình Thuận, Cà Mau, Cao Bằng, Đắk Lắk, Đắk Nông, Điện Biên, Đồng Nai, Đồng Tháp, Gia Lai, Hà Giang, Hà Nam, Hà Tĩnh, Hải Dương, Hậu Giang, Hòa Bình, Hưng Yên, Khánh Hòa, Kiên Giang, Kon Tum, Lai Châu, Lâm Đồng, Lạng Sơn, Lào Cai, Long An, Nam Định, Nghệ An, Ninh Bình, Ninh Thuận, Phú Thọ, Quảng Bình, Quảng Nam, Quảng Ngãi, Quảng Ninh, Quảng Trị,Sóc Trăng, Sơn La, Tây Ninh, Thái Bình, Thái Nguyên, Thanh Hóa, Thừa Thiên Huế ,Tiền Giang, Trà Vinh, Tuyên Quang, Vĩnh Long, Vĩnh Phúc, Yên Bái, Phú Yên, Cần Thơ, Đà Nẵng, Hải Phòng, Hà Nội, TP HCM";
var danhsachten = "Ngọc Bích , Nguyễn Thị Xuân , Phạm Thị Tường Vân , Hoàng Thị Thu , Vương Trang , Đoàn Thị Huệ , Ngô Thị Hoàng Mai , Đinh Thị Thủy , Lò Thị Yến , Nguyễn Thị Mai , Nguyễn Thị Minh Thu , Trương Hồng Hạnh , Thủy Tiên , Hà Minh Thư , Nguyễn Thị Ánh Viên , Nguyễn Thị Hải , Nguyễn Thị Hương , Ngô Thị Luyến , Lương Thị Thanh Tâm , Lý Ngọc Lan , Huỳnh Thị Ngọc Thanh , Nguyễn Thị Dương , Nguyễn Thị Minh , Lê Thị Kiều Diễm , Nguyễn Hoàng Mai , Nguyễn Thị Cẩm Vân , Nguyễn Thị Thanh Nghi , Bế Thị Đào , Nguyễn Hằng , Thảo Nguyên , Lê Thị Hằng , Nguyễn Thị Thủy , Nguyễn Loan , Lê Thị Bích Loan , Lương Thị Ngoãn , Hoàng Thu Hà , Lương Ngọc Trang , Nguyễn Thị Hiền , Nguyễn Thị Quỳnh , Lê Thị Hằng , Lê Thị Thu , Ngô Hoài Thương , Hồ thị quốc mỹ , Ngô Thị Thanh Tuyền , Phan Thị Xuân , Phạm Thị Phượng , Bàn Thị Hoà , Lò Thị Nang , Nguyễn Thị Ngân , Nguyễn Thị Bích Ngọc , Trịnh Thị Tâm , Phạm Hồng Nhung , Bùi Thị Trinh , Phạm Thị Ngọc , Phan Thị Hoa , Nguyễn Trang , Đỗ Lâm Thúy Vy , Nguyễn Thị Uyên Đông , Phạm Thị Phượng , Nguyễn Thị Hoa , Lê Thị Thúy Hằng , Vũ Thị Chi , Dương Minh Châu , Đỗ Thị Huyền , Lê Thị Kim Hạnh , Trần Thị Ngọc Trân , Tạ Thị Thu Anh , Hồng Gấm , Vũ Thị Trang , Lê Thị Kim Tuyền , Nguyễn Thị Hường , Đinh Thị Dung , Bùi Ngọc Lan , Đỗ Thị Hoa , Liễu Thị Trang , Nguyễn Thị Thùy Dương , Nguyễn Thị Thùy Linh , Bùi Thị Xuân Anh , Đào Ngọc Hà , Nguyễn Thanh Tuyền , Hồ Thị Vương Dung , Nguyễn Thanh Thúy , Nguyễn Bùi Anh Thi , Nguyễn Thị Lan Anh, Bùi Thị Ngọc Tú , Vũ Thị Huyến , Hà Thị Minh Thu , Trần  Bích Phượng , Đặng Thị Phương , Diệu Hương , Lê Ngân Giang , Vũ Hồng Nhung , Lâm Thị Thủy , Lê Ngọc Bích , Lê Thị Thanh Nga , Ngô Thị Vĩnh Hảo , Lưu Thị Hồng Nhung , Tạ Thủy Tiên , Phùng Thị Trường , Nguyễn Thị Loan , Nguyễn Thị Phi , Nguyễn Thị Nga , Nguyễn Thị Thùy Dương , Quách Thị Hương , Nguyễn Bích , Nguyễn Minh Phương , Lâm Thị Thơ , Đỗ Thanh Tuân , Nguyễn Thị Phước , Nguyễn Thị Lệ , Võ Thị Thu Trang , Trần Ái Na , Nguyễn Thị Cẩm Tú , Vy Thị Bảy , Phạm Thị Linh , Nguyễn Văn Quyết , Trần Thị Bé , Nguyễn Thị Lan Hương , Nguyễn Thị Huế , Trần Hồng Ngân , Nguyễn Thị Loan , Bùi Đình Danh , Đoàn Thị Thắm , Nguyễn Thị Thảo , Bùi Thị Lợi , Lê Thị Hương , Nguyễn Thị Tươi , Vũ Thị Thắm , Phan Thị Thúy, Ngọc Hà , Phan Tiến Dũng , Tạ Thủy Tiên , Hoàng Thị Thoa , Mai Thi Phương , Nguyễn Thị Kim Yến , Đặng Thị Toán , Nguyễn Hoàng Phú , Đỗ Thị Hương , Bùi Ngọc Sơn , Kiều Thị Nhung , Nguyễn Thị Loan , Nguyễn Kiều Trang , Nguyễn Thị Huế , Chu Ngọc Thúy , Huỳnh Thị Nhanh , Trần Diễm Trang , Phan Thị Vui , Lê Thị Hồng Gấm , Nguyễn Thị Xuân , Ngô Thị Luyến , Lê Ngọc Thư , Nguyễn Thị Thủy , Nguyễn Thị Vinh , Trần Thị Hoạch , Mai Thị Minh Huệ , Phan Thanh Hoa , Lê Thị Ly Lan , Đỗ Hoàng Vân , Trần Bình Anh , Phạm Thi Loan , Nguyễn Thị Ánh Nguyệt , Nguyễn Thị Hoa , Lê Thị Mỹ Nương , Trần Ngọc Dung , Nguyễn Thị Hồng Quyên , Trương Thị Linh , Trần Thuỳ Dung , Trương Thị Hải Yến , Nguyễn Thị An , Bảo Yến , Nguyễn Thị Thu Trang , Lê Thị Diệu Hiền , Nguyễn Vân , Lê Thị Đông , Trần Thị Huyền , Đỗ Thị Quyên , Đào Thị Thơm , Trịnh Thị Diễm My , Nguyễn Thị Nhuần , Phạm Thị Giao Châu , Nguyễn Thị Khanh , Quách Thị Dung , Vũ Thùy Linh , Hoàng Thị Hồng Duyên , Nguyễn Thị Dung , Trần Ngọc Trúc Lê , Dương Thị Thanh Hiền , Nguyễn Thị Quý , Nguyễn Thị Thơ , Nguyễn Thu Hương , Trần Thị Mai , Nguyễn Thị Hải Hà , Hoàng Như Quỳnh , Vũ Thanh Thảo , Đỗ Thị Thúy , Cao Thị Mỹ Linh , Trịnh Thị Thủy , Đặng Thị Hương , Nguyễn Ngọc Hiếu , Nguyễn Nhật Thu , Đỗ Thị Chiêm , Nguyễn Thị Bé , Nguyễn Thị Chung , Nguyễn Thị Ngọc , Nguyễn Thị Mai Chi , Dương Kim Hoàng , Kim Hằng , Nguyễn Ngọc Bảo , Phạm Thị Hồng , Nguyễn Thị Thúy , Nguyễn Thị Tiến , Đỗ Quyên , Phạm Thị Thuý Kiều , Đào Thị Hà , Phan Thị Sen , Nguyễn Thị Mai , Phạm Thị Chung";
var  dsso = danhsachso.split(",");
var  dsdiachi = danhsachdiachi.split(",");
var  dsten = danhsachten.split(",");

function hienthi(){
  $("#popup-notification").slideDown(500).delay(10000).slideUp(500).delay(20000);
  var sophut = Math.floor((Math.random() * 4) + 1);
  var cx= Math.floor((Math.random() * 9000) + 999);
  var rdsten = Math.floor((Math.random() * 198) + 1);
  var rdsso = Math.floor((Math.random() * 28) + 1);
  var rdsdiachi= Math.floor((Math.random() * 62) + 1);
  var ten= dsten[rdsten];
  var diachi= dsdiachi[rdsdiachi];
  var so= dsso[rdsso];
  var d =   Math.floor((Math.random() * 10)+ 1);
  
  if (d>2) {
    document.getElementById("popup-notification").innerHTML= "Cám ơn bạn:<b>" + ten + " </b>có số điện thoại <b>" + so  + "xxx"+ cx + "</b> địa chỉ <b>" + diachi + "</b> đã đăng ký tư vấn (" +sophut +" phút trước)" 	   
  } else {
   document.getElementById("popup-notification").innerHTML= "Cám ơn bạn:<b>" + ten +  "</b> địa chỉ <b>" + diachi + "</b> đã đặt hàng (" +sophut +" phút trước)" 	;   
   
 }
}
