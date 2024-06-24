<div class="delete-profile-modal modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class=" modal-content">
            <div class="modal-body text-center">
                <img src="{{url('image/delete.svg')}}" class="delete-profile-img">
                <h2 style="margin-top: 50px" class="text-center">Are you sure you want to delete your account?</h2>
                <div class="buttons text-center">
                    <form action="">
                        <button type="button" class="btn" data-bs-dismiss="modal">Close</button>
                    </form>
                    <form action="{{route('profileDelete')}}" class="text-center" method="POST">
                        @csrf
                        @method('POST')
                        <button class="btn" type="submit">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>