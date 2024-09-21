<div class="modal animated zoomIn" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Add Car</h6>
            </div>
            <div class="modal-body">
                <form id="save-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Car Name *</label>
                                <input type="text" class="form-control" id="name">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label">Car Brand *</label>
                                <input type="text" class="form-control" id="brand">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label">Car Model *</label>
                                <input type="text" class="form-control" id="model">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label">year *</label>
                                <input type="date" class="form-control" id="year">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label">Car type *</label>
                                <input type="text" class="form-control" id="car_type">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label">Daily Rent Price *</label>
                                <input type="number" class="form-control" id="daily_rent_price">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label">Availability *</label>
                                <input type="text" class="form-control" id="availability">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label">Image *</label>
                                <input type="file" class="form-control" id="image">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="modal-close" class="btn bg-gradient-primary" data-bs-dismiss="modal" aria-label="Close">Close</button>
                <button onclick="Save()" id="save-btn" class="btn bg-gradient-success" >Save</button>
            </div>
        </div>
    </div>
</div>


<script>
    async function Save() {
        let carName = document.getElementById('name').value;
        let carBrand = document.getElementById('brand').value;
        let carModel = document.getElementById('model').value;
        let year = document.getElementById('year').value;
        let car_type = document.getElementById('car_type').value;
        let daily_rent_price = document.getElementById('daily_rent_price').value;
        let availability = document.getElementById('availability').value;
        let image = document.getElementById('image').value;
        const config = {
            headers: {
                'content-type': 'multipart/form-data'
            }

            if (carName.length === 0) {
            errorToast("Car Name Required !")
        } else if (carBrand.length === 0) {
            errorToast("Car Brand Required !")
        }
        else if (carModel.length === 0) {
            errorToast("Car Model Required !")
        }
        else if (year.length === 0) {
            errorToast("Year Required !")
        }
        else if (car_type.length === 0) {
            errorToast("Car type Required !")
        }
        else if (daily_rent_price.length === 0) {
            errorToast("Daily Rent Price Required !")
        }
        else if (availability.length === 0) {
            errorToast("Availability Required !")
        }
        else if (image.length === 0) {
            errorToast("Image Required !")
        }
        else {
            document.getElementById('modal-close').click();
            let formData=new FormData();
            showLoader();
            let res = await axios.post("/car-add-page",formData,config);
            hideLoader();
            if(res.status===200){
                successToast('Request completed');
                document.getElementById("save-form").reset();
                await getList();
            }
            else{
                errorToast("Request fail !")
            }
        }
    }


</script>
