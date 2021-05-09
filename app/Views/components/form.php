<form action="" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
    <div class="-mx-3 md:flex mb-2">
        <div class="md:w-full px-3">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-password">
                Password
            </label>
            <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" id="grid-password" type="text" required placeholder="******************">
        </div>
        <div class="md:w-1/2 px-3">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-state">
                State
            </label>
            <div class="relative">
                <select class="block w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 mb-3 rounded" id="grid-state">
                    <option>New Mexico</option>
                    <option>Missouri</option>
                    <option>Texas</option>
                </select>
            </div>
        </div>
    </div>
    <button type="submit" class="bg-gray-50 text-grey-darker px-3 py-2 rounded w-full mt-4">Добавить</button>
</form>