<?php
namespace BS\CLI\Model;

use BS\CLI\Model\CodeGenerator\Source\BaseModuleBaseController;
use BS\CLI\Model\CodeGenerator\Source\BaseModuleBaseModel;
use BS\CLI\Model\CodeGenerator\Source\BaseModuleBaseTableGateway;
use BS\CLI\Model\CodeGenerator\Source\BaseModuleSubController;
use BS\CLI\Model\CodeGenerator\Source\BaseModuleSubModel;
use BS\CLI\Model\CodeGenerator\Source\BaseModuleSubTableGateway;
use BS\CLI\Model\CodeGenerator\Source\SubModuleBaseController;
use BS\CLI\Model\CodeGenerator\Source\SubModuleBaseTableGateway;
use BS\CLI\Model\CodeGenerator\Source\SubModuleSubController;
use BS\CLI\Model\CodeGenerator\Source\SubModuleSubModel;
use BS\CLI\Model\CodeGenerator\Source\SubModuleSubTableGateway;
use Zend\Db\Metadata\Object\TableObject;

class SourceCodeGenerator extends AbstractCodeGenerator
{
    // =============== Controllers ===================
    public function generateBaseModuleBaseController(TableObject $table)
    {
        $CodeGenerator = new BaseModuleBaseController($table, $this->config->getBaseModule(),
                                                      $this->config->getBaseModule() . '\\' .
                                                      self::NAMESPACE_CONTROLLER . '\AbstractRestfulController');
        $CodeGenerator->setBasePath($this->getConfig()->getCodeBasePath());
        $CodeGenerator->setCodeDirectoryName(self::DIRECTORY_SOURCE);

        return $CodeGenerator;
    }

    public function generateBaseModuleSubController(TableObject $table)
    {
        $CodeGenerator = new BaseModuleSubController($table, $this->config->getBaseModule(), 'Base');
        $CodeGenerator->setBasePath($this->getConfig()->getCodeBasePath());
        $CodeGenerator->setCodeDirectoryName(self::DIRECTORY_SOURCE);

        return $CodeGenerator;
    }


    public function generateSubModuleBaseController(TableObject $table, $module)
    {
        $CodeGenerator = new SubModuleBaseController($table, $module, $this->config->getBaseModule());
        $CodeGenerator->setBasePath($this->getConfig()->getCodeBasePath());
        $CodeGenerator->setCodeDirectoryName(self::DIRECTORY_SOURCE);

        return $CodeGenerator;
    }

    public function generateSubModuleSubController(TableObject $table, $module)
    {
        $CodeGenerator = new SubModuleSubController($table, $module, 'Base');
        $CodeGenerator->setBasePath($this->getConfig()->getCodeBasePath());
        $CodeGenerator->setCodeDirectoryName(self::DIRECTORY_SOURCE);

        return $CodeGenerator;
    }

    // =============== Models ===================
    public function generateBaseModuleBaseModel(TableObject $table)
    {
        $CodeGenerator = new BaseModuleBaseModel($table, $this->config->getBaseModule(),
                                                 $this->config->getBaseModule() . '\\' . self::NAMESPACE_MODEL .
                                                 '\AbstractModel');
        $CodeGenerator->setBasePath($this->getConfig()->getCodeBasePath());
        $CodeGenerator->setCodeDirectoryName(self::DIRECTORY_SOURCE);

        return $CodeGenerator;
    }

    public function generateBaseModuleSubModel(TableObject $table)
    {
        $CodeGenerator = new BaseModuleSubModel($table, $this->config->getBaseModule(), 'Base');
        $CodeGenerator->setBasePath($this->getConfig()->getCodeBasePath());
        $CodeGenerator->setCodeDirectoryName(self::DIRECTORY_SOURCE);

        return $CodeGenerator;
    }

    public function generateSubModuleSubModel(TableObject $table, $module)
    {
        $CodeGenerator = new SubModuleSubModel($table, $module, $this->config->getBaseModule());
        $CodeGenerator->setBasePath($this->getConfig()->getCodeBasePath());
        $CodeGenerator->setCodeDirectoryName(self::DIRECTORY_SOURCE);

        return $CodeGenerator;
    }

    // =============== TableGateways ===================
    public function generateBaseModuleBaseTableGateway(TableObject $table)
    {
        $CodeGenerator = new BaseModuleBaseTableGateway($table, $this->config->getBaseModule(),
                                                        $this->config->getBaseModule() . '\\' .
                                                        self::NAMESPACE_TABLEGATEWAY . '\AbstractTableGateway');
        $CodeGenerator->setBasePath($this->getConfig()->getCodeBasePath());
        $CodeGenerator->setCodeDirectoryName(self::DIRECTORY_SOURCE);

        return $CodeGenerator;
    }

    public function generateBaseModuleSubTableGateway(TableObject $table)
    {
        $CodeGenerator = new BaseModuleSubTableGateway($table, $this->config->getBaseModule(), 'Base');
        $CodeGenerator->setBasePath($this->getConfig()->getCodeBasePath());
        $CodeGenerator->setCodeDirectoryName(self::DIRECTORY_SOURCE);

        return $CodeGenerator;
    }

    public function generateSubModuleBaseTableGateway(TableObject $table, $module)
    {
        $CodeGenerator = new SubModuleBaseTableGateway($table, $module, $this->config->getBaseModule());
        $CodeGenerator->setBasePath($this->getConfig()->getCodeBasePath());
        $CodeGenerator->setCodeDirectoryName(self::DIRECTORY_SOURCE);

        return $CodeGenerator;
    }

    public function generateSubModuleSubTableGateway(TableObject $table, $module)
    {
        $CodeGenerator = new SubModuleSubTableGateway($table, $module, 'Base');
        $CodeGenerator->setBasePath($this->getConfig()->getCodeBasePath());
        $CodeGenerator->setCodeDirectoryName(self::DIRECTORY_SOURCE);

        return $CodeGenerator;
    }
}