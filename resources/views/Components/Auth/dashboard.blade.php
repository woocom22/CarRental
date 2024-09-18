<div class="container mt-5">
    <div class="row d-flex justify-content-center">
        <div class="col-4 shadow p-5 mb-5 bg-body rounded" style="border-radius: 10px;">
            <h2>This is Dashboard</h2>
        </div>
    </div>
</div>

<script>async function onRegistration() {
        let name=document.getElementById('name').value;
        let email=document.getElementById('email').value;
        let password=document.getElementById('password').value;
        let role=document.getElementById('role').value;

        if (name.length===0){
            errorToast('Name is Required')
        } else if (email.length===0){
            errorToast('Email is Required')
        } else if (password.length===0){
            errorToast('Password is Required')
        }else if (role.length===0){
            errorToast('Role is Required')
        } else {
            showLoader();
            let res=await axios.post('/user-registration', {
                name:name,
                email:email,
                password:password,
                role:role

            })
            hideLoader();
            if (res.status===200 && res.data['status']==='success'){
                successToast('Registration Success')
                setTimeout(function (){
                    window.location.href='/'
                },2000)
            } else {
                errorToast('Registration Failed')
            }
        }

    }
</script>
