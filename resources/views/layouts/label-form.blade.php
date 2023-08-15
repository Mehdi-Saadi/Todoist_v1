<div id="labelModal" class="custom-modal modal">
    <form class="custom-modal-content animate px-4 py-3 rounded" action="" method="post" style="max-width: 500px;" id="labelForm">
        @csrf
        <input type="hidden" name="color" id="color" value="#808080">
        <h4 class="border-bottom pb-2">Add label</h4>
        <div class="form-group mt-2 mx-0 mb-0">
            <label for="labelName">Label name</label>
            <input type="text" onkeyup="disableBtn(this, 'addLabelBtn')" class="form-control mb-2" id="labelName" style="height: 30px" name="name" autocomplete="off" autofocus>
            <div class="mb-1">Label color</div>
            <div class="dropdown no-arrow">
                <button type="button" class="dropdown-toggle border btn btn-sm shadow-none d-flex justify-content-start w-100"
                        id="colorDropDown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="d-inline"><i class="fa-solid fa-circle mr-2" style="color: #808080 !important;"></i>Charcoal</span>
                </button>
                <!-- Dropdown - colors -->
                <div class="dropdown-menu w-100 shadow overflow-auto translate-down" aria-labelledby="colorDropDown" style="max-height: 200px;">
                    @foreach($colors as $color)
                        <button type="button" class="dropdown-item btn btn-sm" onclick="selectColor('{{ $color->code }}', '{{ $color->name }}')">
                            <span class="d-inline"><i class="fa-solid fa-circle mr-2" style="color: {{ $color->code }} !important;"></i>{{ $color->name }}</span>
                        </button>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="form-group mb-0">
            <hr>
            <button type="button" class="btn btn-danger btn-sm float-right ml-2" id="addLabelBtn" disabled>Add label</button>
            <button type="button" class="btn btn-sm float-right" onclick="document.getElementById('labelModal').style.display='none'">Cancel</button>
        </div>
    </form>
</div>
