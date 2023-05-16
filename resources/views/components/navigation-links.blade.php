<x-dropdown-link :href="route('profile.edit')">
    {{ __('Профиль') }}
</x-dropdown-link>
@if(Auth::user()->role_id == 1 || Auth::user()->role_id == 3)

    <x-dropdown-link :href="route('defenceReports.index')">
        {{ __('Просмотр загруженных работ') }}
    </x-dropdown-link>
    <x-dropdown-link :href="route('disciplines.index')">
        {{ __('Справочник дисциплин') }}
    </x-dropdown-link>
    <x-dropdown-link :href="route('specialties.index')">
        {{ __('Справочник специальностей') }}
    </x-dropdown-link>
    <x-dropdown-link :href="route('groups.index')">
        {{ __('Справочник групп') }}
    </x-dropdown-link>
    <x-dropdown-link :href="route('students.index')">
        {{ __('Справочник студентов') }}
    </x-dropdown-link>
    <x-dropdown-link :href="route('reportTypes.index')">
        {{ __('Справочник видов отчетов') }}
    </x-dropdown-link>
    <x-dropdown-link :href="route('positions.index')">
        {{ __('Справочник должностей') }}
    </x-dropdown-link>
    <x-dropdown-link :href="route('employees.index')">
        {{ __('Справочник сотрудников') }}
    </x-dropdown-link>
    <x-dropdown-link :href="route('commissions.index')">
        {{ __('Справочник комиссий') }}
    </x-dropdown-link>
    <x-dropdown-link :href="route('commissionMembers.index')">
        {{ __('Справочник сотрудников коммиссий') }}
    </x-dropdown-link>
    <x-dropdown-link :href="route('report-disciplines.index')">
        {{ __('Справочник дисциплин отчета') }}
    </x-dropdown-link>
    <x-dropdown-link :href="route('defences.index')">
        {{ __('Справочник защит') }}
    </x-dropdown-link>
    <x-dropdown-link :href="route('defenceReports.index')">
        {{ __('Справочник отчетов защит') }}
    </x-dropdown-link>
    <x-dropdown-link :href="route('defenceReports.uploadIndex')">
        {{ __('Загрузка работы') }}
    </x-dropdown-link>
    <x-dropdown-link :href="route('defenceReports.uploadReports')">
        {{ __('Выгрузка акта') }}
    </x-dropdown-link>
    <x-dropdown-link :href="route('defenceReports.stats')">
        {{ __('Статистика') }}
    </x-dropdown-link>
@elseif(Auth::user()->role_id == 2)
    <x-dropdown-link :href="route('defenceReports.uploadIndex')">
        {{ __('Загрузка работы') }}
    </x-dropdown-link>
@elseif(Auth::user()->role_id == 5)
    <x-dropdown-link :href="route('report-disciplines.index')">
        {{ __('Справочник дисциплин отчета') }}
    </x-dropdown-link>
@elseif(Auth::user()->role_id == 4)
    <x-dropdown-link :href="route('defenceReports.index')">
        {{ __('Просмотр загруженных работ') }}
    </x-dropdown-link>
@elseif(Auth::user()->role_id == 6)
    <x-dropdown-link :href="route('defenceReports.index')">
        {{ __('Просмотр загруженных работ') }}
    </x-dropdown-link>
@endif
