 // 1. Xác định các phần tử cần tác động:
var txtFruit = document.getElementById('txtFruit');
var btnShowFruit = document.getElementById('btnShowFruit');
var imgContainer = document.getElementById('img-container');
var imgSrc = document.getElementById('img-src')
// 2. Bắt sự kiện CLICK:

btnShowFruit.addEventListener('click',function(){
    // Lấy giá trị từ ô txtFruit: người dùng ko nhập, người dùng có Nhập nhưng ko tồn tại
    // Coi như CSDL để so sánh là 1 mảng:
    var aFruits = ['orange','lemon','banana'];
    if(txtFruit.value == ''){
        alert("Bạn chưa nhập Giá trị");
    }else{
        // Cần so sánh txtFruit.value với các phần tử của MẢNG
        
        var ketQua=false;
        for(var i=0; i<aFruits.length; i++){
            if(txtFruit.value == aFruits[i]){
                ketQua = true;
                break;
            }
        }
        if(ketQua==true){
            imgSrc.src='images/'+txtFruit.value+'.jpg';
         imgContainer.innerHTML = '<img src="images/'+txtFruit.value+'.jpg" alt="" class="img-fluid"></img>';
        }else{
            alert("Trái cây ko tồn tại");
        }
    }
}) 

/* $(document).ready(function() {
    $("#btnShowFruit").click(function() {
        $("img-content").attr('src','images/'+$("#txtFruit").val()+'.jpg')
    })

}) 

/* $(document).ready(function() {
    $("#btnShowFruit").click(function() {
        var fruit = $("#txtFruit").val();
        $.ajax({
            url:'../process.php',
            type:'post',
            data:{guiDi: fruit},
            success: function(traVe) {
                alert('Tôi đã nhận được:'+traVe);
            }
        })
    })

}) */
