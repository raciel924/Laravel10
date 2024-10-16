<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    const
        USERS='users',
        ROLES='roles',
        CLIENTS='clients',
        MEMBERSHIPS='memberships',
        PERMISSIONS='permissions',
        SENSORS='sensors',
        TYPE_SENSORS='types',
        SECTORS='sectors',
        SECTOR_SENSORS='sector_sensors',
        ACTUATORS='actuators',
        ACTUATORS_SECTORS='actuators_sectors',
        TYPE_ACTUATOR='type_actuator',
        DURATION='duration',
        HISTORY_MEMBERSHIPS='history_memberships',
        CONTAINERS='containers',
        SIZE='size',
        EQUIPMENTS='equipments',
        CONTAINER_CLIENTS='container_clients',
        FLOORS='floors',
        TYPE_FLOORS='type_floors',
        CONTAINER_FLOORS='container_floors',
        ADDRESS='address';

    public function up(): void
    {
       $this->createTables();
    }

    public function createTables()
    {
        self::createRolesTable();
        self::createDurationTable();
        self::createAdressesTable();
        self::createClientTable();
        self::createTypeSensorsTable();
        self::createSectorsTable();
        self::createTypeActuatorsTable();
        self::createTypeFloorsTable();
        self::createSizeTable();
        self::createEquipmentsTable();
        self::createMembershipsTable();
        self::createSENSORSTable();
        self::createACTUATORSTable();
        self::createFloorsTable();
        self::createActuatorSectorTable();
        self::createSensorSectorTable();
        self::createPermissionsTable();
        self::createContainersTable();
        self::createContainerClientable();
        self::createContainerFloorstable();
        self::createHistoryMembershiptable();
        self::createUserstable();
    }
    public function createEquipmentsTable() {
        Schema::create(self::EQUIPMENTS, function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });
    }
  
    public function createSizeTable()
    {
        Schema::create(self::SIZE,function(Blueprint $table){
            $table->id();
            $table->string('name');
            $table->float('value');
        });
    }
    public function createTypeFloorsTable(){
        Schema::create(self::TYPE_FLOORS,function(Blueprint $table){
            $table->id();
            $table->string('name');
        });
    }
    public function createTypeActuatorsTable() {
        Schema::create(self::TYPE_ACTUATOR, function (Blueprint $table) {
           $table->id();
           $table->string('name');
        });
    }
    public function createSectorsTable()
    {
        Schema::create(self::SECTORS, function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });
    }
    public function createRolesTable() {
        Schema::create(self::ROLES, function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });
    }
    public function createDurationTable() {
        Schema::create(self::DURATION, function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('duration(days)');
        });
    }

    public function createAdressesTable() {
        Schema::create(self::ADDRESS, function (Blueprint $table) {
            $table->id();
            $table->string('street');
            $table->string('number_int', 6);
            $table->string('number_ext', 6)->nullable();
            $table->string('colony');
            $table->string('city');
            $table->string('state');
            $table->integer('zip_code');
            $table->string('country');
        });
    }
    public function createClientTable() {
        Schema::create(self::CLIENTS, function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('last_name');
            $table->string('second_last_name');
            $table->string('email');
            $table->string('password');
            $table->integer('phone');
            $table->unsignedBigInteger('adrress_id'); 
            $table->unsignedBigInteger('active'); 
            $table->foreign('adrress_id')->references('id')->on(self::ADDRESS)->onDelete('cascade');
        });
    }

    public function  createTypeSensorsTable() {
        Schema::create(self::TYPE_SENSORS,function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });
    }

    public function createMembershipsTable() {
        Schema::create(self::MEMBERSHIPS,function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->float('price');
            $table->unsignedBigInteger('duration_id'); 
            $table->foreign('duration_id')->references('id')->on(self::DURATION)->onDelete('cascade');
        });

    }
    public function createSENSORSTable() {
        Schema::create(self::SENSORS,function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('quantity');
            $table->unsignedBigInteger('type_sensor_id'); 
            $table->foreign('type_sensor_id')->references('id')->on(self::SENSORS)->onDelete('cascade');
        });   
    }
    public function createACTUATORSTable() {
        Schema::create(self::ACTUATORS,function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('quantity');
            $table->unsignedBigInteger('type_actuators_id'); 
            $table->foreign('type_actuators_id')->references('id')->on(self::ACTUATORS)->onDelete('cascade');
        });   
    }
    public function createFloorsTable() {
        Schema::create(self::FLOORS,function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->float('quantity_water');
            $table->float('quantity_solar');
            $table->float('humidity');
            $table->float('altitude');
            $table->unsignedBigInteger('type_id'); 
            $table->foreign('type_id')->references('id')->on(self::FLOORS)->onDelete('cascade');
        });   
    }
    public function createActuatorSectorTable() {
        Schema::create(self::ACTUATORS_SECTORS,function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('actuators_id'); 
            $table->foreign('actuators_id')->references('id')->on(self::ACTUATORS)->onDelete('cascade');
            $table->unsignedBigInteger('sector_id'); 
            $table->foreign('sector_id')->references('id')->on(self::SECTORS)->onDelete('cascade');
        });   
    }
    public function createSensorSectorTable() {
        Schema::create(self::SECTOR_SENSORS,function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sensors_id'); 
            $table->foreign('sensors_id')->references('id')->on(self::SENSORS)->onDelete('cascade');
            $table->unsignedBigInteger('sector_id'); 
            $table->foreign('sector_id')->references('id')->on(self::SECTORS)->onDelete('cascade');
        });   
    }
    public function createPermissionsTable() {
        Schema::create(self::PERMISSIONS,function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sensors_id'); 
            $table->foreign('sensors_id')->references('id')->on(self::ACTUATORS_SECTORS)->onDelete('cascade');
            $table->unsignedBigInteger('actuator_id'); 
            $table->foreign('actuator_id')->references('id')->on(self::SECTOR_SENSORS)->onDelete('cascade');
        });   
    }
    public function createContainersTable() {
        Schema::create(self::CONTAINERS,function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('size_id'); 
            $table->foreign('size_id')->references('id')->on(self::SIZE)->onDelete('cascade');
            $table->unsignedBigInteger('equipment_id'); 
            $table->foreign('equipment_id')->references('id')->on(self::EQUIPMENTS)->onDelete('cascade');
        });   
    }
    public function createContainerClientable() {
        Schema::create(self::CONTAINER_CLIENTS,function (Blueprint $table) {
            $table->id();
            $table->boolean('active');
            $table->unsignedBigInteger('containers_id'); 
            $table->foreign('containers_id')->references('id')->on(self::CONTAINERS)->onDelete('cascade');
            $table->unsignedBigInteger('clients_id'); 
            $table->foreign('clients_id')->references('id')->on(self::CLIENTS)->onDelete('cascade');
        });   
    } 
    public function createContainerFloorstable() {
        Schema::create(self::CONTAINER_FLOORS,function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('container_client_id'); 
            $table->unsignedBigInteger('floors_id'); 
            $table->unsignedBigInteger('sector_id'); 
            $table->foreign('container_client_id')->references('id')->on(self::CONTAINER_CLIENTS)->onDelete('cascade');
            $table->foreign('floors_id')->references('id')->on(self::FLOORS)->onDelete('cascade');
            $table->foreign('sector_id')->references('id')->on(self::SECTORS)->onDelete('cascade');

        });   
    }

    public function createHistoryMembershiptable() {
        Schema::create(self::HISTORY_MEMBERSHIPS,function (Blueprint $table) {
            $table->id();
            $table->date('start_date');
            $table->date('end_date');
            $table->boolean('active');
            $table->unsignedBigInteger('memberships_id'); 
            $table->unsignedBigInteger('client_id'); 
            $table->unsignedBigInteger('permissions_id'); 
            $table->foreign('memberships_id')->references('id')->on(self::MEMBERSHIPS)->onDelete('cascade');
            $table->foreign('permissions_id')->references('id')->on(self::PERMISSIONS)->onDelete('cascade');
            $table->foreign('client_id')->references('id')->on(self::CLIENTS)->onDelete('cascade');
        });   
    }
    public function createUserstable() {
        Schema::create(self::USERS,function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('last_name');
            $table->string('second_last_name');
            $table->string('email');
            $table->string('password');
            $table->integer('phone');
            $table->unsignedBigInteger('role_id'); 
            $table->unsignedBigInteger('active'); 
            $table->foreign('role_id')->references('id')->on(self::ROLES)->onDelete('cascade');
        });   
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $tables = [
            self::ROLES,
            self::DURATION,
            self::ADDRESS,
            self::TYPE_SENSORS,
            self::TYPE_ACTUATOR,
            self::TYPE_FLOORS,
            self::SECTORS,
            self::SIZE,
            self::EQUIPMENTS,
            self::ADDRESS,
            self::TYPE_SENSORS,
            self::MEMBERSHIPS,
            self::ACTUATORS,
            self::FLOORS,
            self::ACTUATORS_SECTORS,
            self::SECTOR_SENSORS,
            self::PERMISSIONS,
            self::CONTAINERS,
            self::CONTAINER_CLIENTS,
            self::CONTAINER_FLOORS,
            self::HISTORY_MEMBERSHIPS,
            self::USERS,
        ];
        foreach (array_reverse($tables)  as $table) {
            Schema::dropIfExists($table);
        }
    }

};
