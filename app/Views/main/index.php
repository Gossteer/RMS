{{ include('/layouts/header.php') }}

<form action="{{ 'hotel/create'|route }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
    <div class="-mx-3 md:flex mb-2">
        <div class="md:w-full px-3">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="name-hotel">
                Название отеля
            </label>
            <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" name="name_hotel" id="name-hotel" type="text" required>
        </div>
        <div class="md:w-full px-3">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="floor-hotel">
                Количество этажей
            </label>
            <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" name="floor_hotel" id="floor-hotel" type="number" step="any" onchange="maxValue(this)" max="100" required>
        </div>
        <div class="md:w-full px-3">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="rooms-floor">
                Количество комнат на этаже
            </label>
            <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" name="rooms_floor" id="rooms-floor" type="number" step="any" onchange="maxValue(this)" max="100" required>
        </div>
        <div class="md:w-1/2 px-3">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="hotelcategory">
                Количество звёзд
            </label>
            <div class="relative">
                <select class="block w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 mb-3 rounded" name="select_hotelcategory_id" id="hotelcategory" required>
                    {% for hotel_category in hotel_categories %}
                    <option value="{{ hotel_category.id }}">
                        {% for star in 1..hotel_category.name %}
                        ★
                        {% endfor %}
                    </option>
                    {% endfor %}
                </select>
            </div>
        </div>
    </div>
    <button type="submit" class="bg-gray-50 text-grey-darker px-3 py-2 rounded w-full mt-4">Добавить</button>
</form>
<div class='overflow-x-auto w-full'>
    <!-- Table -->
    <table class='mx-auto max-w-4xl w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden'>
        <thead class="bg-gray-50">
            <tr class="text-gray-600 text-left">
                <th class="font-semibold text-sm uppercase px-6 py-4">
                    Название отеля
                </th>
                <th class="font-semibold text-sm uppercase px-6 py-4">
                    Количество этажей
                </th>
                <th class="font-semibold text-sm uppercase px-6 py-4 text-center">
                    Количество звёзд
                </th>
                <th class="font-semibold text-sm uppercase px-6 py-4">

                </th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            {% for hotel in hotels %}
            <tr>
                <td class="px-6 py-4">
                    <div class="flex items-center space-x-3">
                        <div class="inline-flex w-10 h-10">
                            <img class='w-10 h-10 object-cover rounded-full' alt='User avatar' src='https://i.pravatar.cc/10'>
                        </div>
                        <div>
                            <p class="">
                                {{ hotel.name }}
                            </p>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4 text-center">

                    {{ hotel.floor }}
                </td>
                <td class="px-6 py-4 text-center">
                    {% for star in 0..hotel.hotelcategory_id %}
                        ★
                    {% endfor %}
                </td>
                <td class="px-6 py-4 text-center">
                    <a href="{{ 'hotel/delete'|route }}?hotel_id={{ hotel.id }}" class="text-purple-800 hover:underline">Удалить</a>
                </td>
            </tr>
            {% endfor %}
        </tbody>
    </table>

</div>

<div class='overflow-x-auto w-full mt-5'>
    <!-- Table -->
    <table class='mx-auto max-w-4xl w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden'>
        <thead class="bg-gray-50">
            <tr class="text-gray-600 text-left">
                <th class="font-semibold text-sm uppercase px-6 py-4">
                    Отель
                </th>
                <th class="font-semibold text-sm uppercase px-6 py-4">
                    Количество комнат
                </th>
                <th class="font-semibold text-sm uppercase px-6 py-4">

                </th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            {% for floor in floors %}
            <tr>
                <td class="px-6 py-4">
                    <div class="flex items-center space-x-3">
                        <div class="inline-flex w-10 h-10">
                            <img class='w-10 h-10 object-cover rounded-full' alt='User avatar' src='https://i.pravatar.cc/10'>
                        </div>
                        <div>
                            <p class="">
                                {{ floor.hotel_id }}
                            </p>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4 text-center">
                    {{ floor.rooms }}
                </td>
                <td class="px-6 py-4 text-center">
                    <a href="{{ 'floor/delete'|route }}?floor_id={{ floor.id }}" class="text-purple-800 hover:underline">Удалить</a>
                </td>
            </tr>
            {% endfor %}
        </tbody>
    </table>

</div>

{{ include('/layouts/footer.php') }}