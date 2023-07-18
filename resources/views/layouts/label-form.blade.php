<div id="taskForm" class="modal">
    <form class="modal-content animate px-4 py-3" action="{{ route('createLabel') }}" method="post">
        @csrf
        <input type="hidden" name="color" id="color" value="858796">
        <div class="form-group m-0">
            <input type="text" class="form-control my-2 border-0" style="height: 30px" placeholder="Label name" name="name" required autocomplete="off" autofocus>
            <div class="dropdown no-arrow">
                <button type="button" class="dropdown-toggle btn btn-sm ml-2 d-flex justify-content-start"
                        id="labelDropDown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width: 100%">
                    <span class="d-inline"><i class="fa-solid fa-circle mr-2"></i>Label color</span>
                </button>
                <!-- Dropdown - colors -->
                <div class="dropdown-menu shadow" aria-labelledby="labelDropDown">
                    <button type="button" class="dropdown-item btn btn-sm" onclick="selectColor(1)">
                        <span class="d-inline"><i class="fa-solid fa-circle mr-2" style="color: #b8258f"></i>Berry Red</span>
                    </button>
                </div>
            </div>
        </div>
        <div class="form-group mb-0">
            <hr>
            <button type="submit" class="btn btn-danger btn-sm float-right ml-2">Add label</button>
            <button type="button" class="btn btn-sm float-right" onclick="document.getElementById('taskForm').style.display='none'">Cancel</button>
        </div>

        <!-- show errors if exists -->
        @error('name')
        @php
            toast("$message", 'error');
        @endphp
        @enderror

        @error('color')
        @php
            toast("$message", 'error');
        @endphp
        @enderror

    </form>
</div>
