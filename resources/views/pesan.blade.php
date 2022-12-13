@extends('layout.user')
@section('content')
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,1,0" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
<style>
    .input-atas{
        width: 298px;
        margin-left: 10px;
        height: 24px;
        background: #F4F4F4;
        border: 0.5px solid #A7A7A7;
        border-radius: 3px;
    }
</style>
<div class="as-cart-wrapper space-top space-extra-bottom" style="text-align: center;">
<h2 class="h4 summary-title">Informasi Pesanan</h2>
<div class="container">
    <form class="woocommerce-cart-form" id="formD" name="formD" action="{{ route("tambah.Pesanan",["id"=>$minuman->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div style="display: flex; justify-content: center;">       
            <label for="nama"><span class="material-symbols-outlined" style="color: #D32529;">person</span></label>
            <input type="text" name="nama" class="input-atas" placeholder="Nama.." required>
        </div>
        <div style="display: flex; justify-content: center;">       
            <label for="nama"><span class="material-symbols-outlined" style="color: #D32529;">table_restaurant</span></label>
            <input type="number" name="meja" class="input-atas" placeholder="Nomor Meja.." required></div>
        <table class="cart_table">
            <thead>
                <tr>
                    <th class="cart-col-image">Image</th>
                    <th class="cart-col-productname">Product Name</th>
                    <th class="cart-col-quantity">Quantity</th>
                    <th class="cart-col-total">Total</th>
                </tr>
            </thead>
            <tbody>
                <tr class="cart_item">
                    <td data-title="Product"><a class="cart-productimage" href="javascript:;"><img
                                width="91" height="91" src="{{ asset('storage/'.$minuman->gambar) }}" alt="Image"></a>
                    </td>
                    <td data-title="Name">{{ $minuman->nama }}</td>
                    <td data-title="Quantity">
                        <div class="quantity">
                            <input type="number" name="jumlah" class="qty-input" value="1" min="1" max="99" readonly> 
                        </div>
                    </td>
                    <td data-title="Hot/Ice">
                        <span class="amount"><bdi>
                            @if($minuman->pilihan == "hot")
                                <span class="material-symbols-outlined" style="color: #D32529;position: relative;top: 3px;">local_fire_department</span>Hot
                            @else
                                <span class="material-symbols-outlined" style="color: #00C2FF;position: relative;top: 3px;">ac_unit</span>Ice
                            @endif
                        </bdi></span></td>
                </tr>
            </tbody>
        </table>
        <div class="row justify-content-end">
            <div class="col-md-8 col-lg-7 col-xl-6">
                <div class="actions"><button type="submit" class="as-btn" style="height: 29px;text-align: center;padding-top: 8px;text-transform: capitalize;font-weight: 700;font-size: 12px;padding-bottom: 7px;">Buat Pesanan</button></div>
            </div>
        </div>
    </form>

</div>
</div>
<script type="text/javascript" language="Javascript">
    function sum() {
      var txtFirstNumberValue1 = document.getElementById('harga1').value;
      var txtSecondNumberValue1 = document.getElementById('jumlah1').value;

      var newValue1 = txtSecondNumberValue1 || 0;
      var result1 = parseInt(txtFirstNumberValue1) * parseInt(newValue1);
      if (!isNaN(result1)) {
         document.getElementById('total').value = 'Rp.' + result1;
      }
}        
</script>
@endsection