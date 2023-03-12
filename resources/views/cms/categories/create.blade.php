<x-cms-master-layout>

    <x-breadcrumb :title="$pageTitle" :item="2"/>

    <x-error/>

    <x-form-base :route="'categories.store'" :title="$pageTitle" :subtitle="$subTitle">
        
        <!-- Event Category-->
        <x-input-field :label="'Category Title'" :name="'name'" :col="12" :required="TRUE" :autofocus="TRUE"/>

        <!-- Cateogry  Description -->
        <x-text-area-field :label="'Description'"  :name="'description'" :col="12" :rows="6" :required="TRUE" />

        <!-- Button -->
        <x-button :title="'Save'"/>
    </x-form-base>

    
    
   


</x-cms-master-layout>
