<div class="modal animated zoomIn" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Product</h5>
            </div>
            <div class="modal-body">
                <form id="update-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">


                                <label class="form-label">Category</label>
                                <select type="text" class="form-control form-select" id="productCategoryUpdate">
                                    <option value="">Select Category</option>
                                </select>

                                <label class="form-label mt-2">Name</label>
                                <input type="text" class="form-control" id="productNameUpdate">

                                <label class="form-label mt-2">Price</label>
                                <input type="text" class="form-control" id="productPriceUpdate">

                                <label class="form-label mt-2">Unit</label>
                                <input type="text" class="form-control" id="productUnitUpdate">
                                <br/>
                                <img class="w-15" id="oldImg" src="{{asset('images/default.jpg')}}"/>
                                <br/>
                                <label class="form-label mt-2">Image</label>
                                <input oninput="oldImg.src=window.URL.createObjectURL(this.files[0])"  type="file" class="form-control" id="productImgUpdate">

                                <input type="text" class="d-none" id="updateID">
                                <input type="text" class="d-none" id="filePath">


                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button id="update-modal-close" class="btn bg-gradient-primary" data-bs-dismiss="modal" aria-label="Close">Close</button>
                <button onclick="update()" id="update-btn" class="btn bg-gradient-success" >Update</button>
            </div>

        </div>
    </div>
</div>


<script>



    async function UpdateFillCategoryDropDown(){
        let res = await axios.get("/category_list");

    $("#productCategoryUpdate").empty();
    $("#productCategoryUpdate").append(`<option value="">Select Category</option>`);

    res.data.categories.forEach(item => {
        let option = `<option value="${item.id}">${item.name}</option>`;
        $("#productCategoryUpdate").append(option);
        })
    }


    async function FillUpUpdateForm(id,filePath){

        document.getElementById('updateID').value=id;
        document.getElementById('filePath').value=filePath;
        document.getElementById('oldImg').src = "/storage/" + filePath;


        showLoader();
        await UpdateFillCategoryDropDown();

        let res=await axios.post("/product_id",{id:id})
        hideLoader();

        document.getElementById('productNameUpdate').value=res.data['name'];
        document.getElementById('productPriceUpdate').value=res.data['price'];
        document.getElementById('productUnitUpdate').value=res.data['unit'];
        document.getElementById('productCategoryUpdate').value=res.data['category_id'];

    }



async function update() {

    let productCategoryUpdate = document.getElementById('productCategoryUpdate').value;
    let productNameUpdate = document.getElementById('productNameUpdate').value;
    let productPriceUpdate = document.getElementById('productPriceUpdate').value;
    let productUnitUpdate = document.getElementById('productUnitUpdate').value;
    let updateID = document.getElementById('updateID').value;
    let productImgUpdate = document.getElementById('productImgUpdate').files[0];

    if (!productCategoryUpdate) return errorToast("Product Category Required!");
    if (!productNameUpdate) return errorToast("Product Name Required!");
    if (!productPriceUpdate) return errorToast("Product Price Required!");
    if (!productUnitUpdate) return errorToast("Product Unit Required!");

    document.getElementById('update-modal-close').click();

    let formData = new FormData();
    formData.append('id', updateID);
    formData.append('name', productNameUpdate);
    formData.append('price', productPriceUpdate);
    formData.append('unit', productUnitUpdate);
    formData.append('category_id', productCategoryUpdate);

    if(productImgUpdate){
        formData.append('image', productImgUpdate);
    }

    showLoader();
    let res = await axios.post("/product_update", formData);
    hideLoader();

    if (res.status === 200 && res.data.status === 'Success') {
        successToast('Product updated successfully');
        document.getElementById("update-form").reset();
        await getList();
    } else {
        errorToast("Request failed!");
    }
}

</script>
