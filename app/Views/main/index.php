{{ include('/layouts/header.php') }}

<form action="hotel/create" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
    <div class="-mx-3 md:flex mb-2">
        <div class="md:w-full px-3">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="name-hotel">
                Название отеля
            </label>
            <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" name="name_hotel" id="name-hotel" type="text" require>
        </div>
    </div>
    <button type="submit" class="bg-gray-50 text-grey-darker px-3 py-2 rounded w-full mt-4">Добавить</button>
</form>

{{ include('/components/table.php') }}

{{ include('/layouts/footer.php') }}