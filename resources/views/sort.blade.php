<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>{{ env('APP_NAME') }}</title>
    <!-- font awesome -->
    <link href="/assets/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="/assets/fontawesome/css/regular.min.css" rel="stylesheet">
    <link href="/assets/fontawesome/css/solid.min.css" rel="stylesheet">

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="container" ondrop="console.log(serialize(root))">
		<div class="row mt-4 d-flex justify-content-center">

            <div style="max-width: 300px" >
                <form class="d-none d-sm-inline-block my-2 my-md-0 mw-100" action="">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control bg-light small" placeholder="New Task..." autocomplete="off">
                        <button class="btn btn-primary" type="submit">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </div>
                </form>
            </div>

		</div>

        <div class="row mt-4">
            <div id="nestedRoot" class="list-group col nested-sortable">
                <div data-sortable-id="1.1" class="list-group-item nested-1">
                    <i class="fa-regular fa-circle"></i>
                    Item 1.1
                    <div class="list-group nested-sortable">


                        <div data-sortable-id="2.1" class="list-group-item nested-2">
                            <i class="fa-regular fa-circle"></i>
                            Item 2.1
                            <div class="list-group nested-sortable">

                            </div>
                        </div>


                        <div data-sortable-id="2.2" class="list-group-item nested-2">
                            <i class="fa-regular fa-circle"></i>
                            Item 2.2
                            <div class="list-group nested-sortable">


                                <div data-sortable-id="3.1" class="list-group-item nested-3">
                                    <i class="fa-regular fa-circle"></i>
                                    Item 3.1
                                    <div class="list-group nested-sortable">

                                    </div>
                                </div>


                                <div data-sortable-id="3.2" class="list-group-item nested-3">
                                    <i class="fa-regular fa-circle"></i>
                                    Item 3.2
                                    <div class="list-group nested-sortable">

                                    </div>
                                </div>


                                <div data-sortable-id="3.3" class="list-group-item nested-3">
                                    <i class="fa-regular fa-circle"></i>
                                    Item 3.3
                                    <div class="list-group nested-sortable">

                                    </div>
                                </div>


                                <div data-sortable-id="3.4" class="list-group-item nested-3">
                                    <i class="fa-regular fa-circle"></i>
                                    Item 3.4
                                    <div class="list-group nested-sortable">

                                    </div>
                                </div>


                            </div>
                        </div>


                        <div data-sortable-id="2.3" class="list-group-item nested-2">
                            <i class="fa-regular fa-circle"></i>
                            Item 2.3
                            <div class="list-group nested-sortable">

                            </div>
                        </div>


                        <div data-sortable-id="2.4" class="list-group-item nested-2">
                            <i class="fa-regular fa-circle"></i>
                            Item 2.4
                            <div class="list-group nested-sortable">

                            </div>
                        </div>


                    </div>
                </div>


                <div data-sortable-id="1.2" class="list-group-item nested-1">
                    <i class="fa-regular fa-circle"></i>
                    Item 1.2
                    <div class="list-group nested-sortable">

                    </div>
                </div>


                <div data-sortable-id="1.3" class="list-group-item nested-1">
                    {{--                    <i class="fa-regular fa-circle-dot"></i>--}}
                    <i class="fa-regular fa-circle"></i>
                    Item 1.3
                    <div class="list-group nested-sortable">

                    </div>
                </div>

            </div>
        </div>

        <!-- jsDelivr :: Sortable :: Latest (https://www.jsdelivr.com/package/npm/sortablejs) -->
        <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
    <script>
        // Nested demo
        let nestedSortables = [].slice.call(document.querySelectorAll('.nested-sortable'));

        console.log(nestedSortables);

        // Loop through each nested sortable element
        for (let i = 0; i < nestedSortables.length; i++) {
            new Sortable(nestedSortables[i], {
                group: 'nested',
                animation: 150,
                fallbackOnBody: true,
                swapThreshold: 0.65
            });
        }


        const nestedQuery = '.nested-sortable';
        const identifier = 'sortableId';
        const root = document.getElementById('nestedRoot');
        function serialize(sortable) {
            let serialized = [];
            let children = [].slice.call(sortable.children);
            for (let i in children) {
                let nested = children[i].querySelector(nestedQuery);
                serialized.push({
                    id: children[i].dataset[identifier],
                    children: nested ? serialize(nested) : []
                });
            }
            return serialized;
        }
        // console.log(serialize(root));
    </script>
</body>
</html>
