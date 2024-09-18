<div class="container mt-5">
    <div class="row d-flex justify-content-center">
        <div class="col-4 shadow p-5 mb-5 bg-body rounded" style="border-radius: 10px;">
            <form enctype="multipart/form-data" action="{{ url('/car-add-page') }}" method="post">
                @csrf
                <div class="mb-1">
                    <label for="exampleInputEmail1" class="form-label">Car Name</label>
                    <input id="name" type="text" name="name" class="form-control">
                </div>
                <div class="mb-1">
                    <label for="exampleInputEmail1" class="form-label">Brand</label>
                    <input id="brand" type="text" name="brand" class="form-control" >
                </div>
                <div class="mb-1">
                    <label for="exampleInputEmail1" class="form-label">Model</label>
                    <input id="model" type="text" name="model" class="form-control" >
                </div>
                <div class="mb-1">
                    <label for="exampleInputEmail1" class="form-label">Year</label>
                    <input id="year" type="number" name="year" class="form-control" >
                </div>
                <div class="mb-1">
                    <label for="exampleInputEmail1" class="form-label">Car Type</label>
                    <input id="car_type" type="text" name="car_type" class="form-control" >
                </div>
                <div class="mb-1">
                    <label for="exampleInputEmail1" class="form-label">Daily Rent Price</label>
                    <input id="daily_rent_price" type="number" name="daily_rent_price" class="form-control" >
                </div>
                <div class="mb-1">
                    <label for="exampleInputEmail1" class="form-label">Availability</label>
                    <input id="availability" type="text" name="availability" class="form-control" >
                </div>
                <div class="mb-1">
                    <label for="exampleInputEmail1" class="form-label">Image</label>
                    <input id="image" type="file" name="image" class="form-control" >
                </div>
                <button type="submit" class="btn btn-primary mt-4">Registration</button>
{{--                <button onclick="onRegistration()" type="submit" class="btn btn-primary mt-4">Registration</button>--}}
            </form>
        </div>
    </div>
</div>

{{--<script>async function onRegistration() {--}}
{{--        let name=document.getElementById('name').value;--}}
{{--        let email=document.getElementById('email').value;--}}
{{--        let password=document.getElementById('password').value;--}}
{{--        let role=document.getElementById('role').value;--}}

{{--        if (name.length===0){--}}
{{--            errorToast('Name is Required')--}}
{{--        } else if (email.length===0){--}}
{{--            errorToast('Email is Required')--}}
{{--        } else if (password.length===0){--}}
{{--            errorToast('Password is Required')--}}
{{--        }else if (role.length===0){--}}
{{--            errorToast('Role is Required')--}}
{{--        } else {--}}
{{--            showLoader();--}}
{{--            let res=await axios.post('/user-registration', {--}}
{{--                name:name,--}}
{{--                email:email,--}}
{{--                password:password,--}}
{{--                role:role--}}

{{--            })--}}
{{--            hideLoader();--}}
{{--            if (res.status===200 && res.data['status']==='success'){--}}
{{--                successToast('Registration Success')--}}
{{--                setTimeout(function (){--}}
{{--                    window.location.href='/'--}}
{{--                },2000)--}}
{{--            } else {--}}
{{--                errorToast('Registration Failed')--}}
{{--            }--}}
{{--        }--}}

{{--    }--}}
{{--</script>--}}
