<?php
namespace BS\CLI\Model\CodeGenerator\Source;

use Camel\CaseTransformer;
use Camel\Format\SnakeCase;
use Camel\Format\StudlyCaps;
use BS\CLI\Model\AbstractCodeGenerator;
use BS\CLI\Model\CodeGenerator\AbstractFileGenerator;
use Zend\Code\Generator\ClassGenerator;
use Zend\Db\Metadata\Object\TableObject;

class SubModuleSubController extends AbstractFileGenerator
{

    public function __construct(TableObject $table, $module = null, $parentClassNamespace = null)
    {
        parent::__construct();

        $this->table = $table;
        $Transformer = new CaseTransformer(new SnakeCase(), new StudlyCaps());
        $className   = ucfirst($Transformer->transform($this->table->getName()) . 'Controller');
        $this->setFilename($className);

        $ClassGenerator = new ClassGenerator($className);

        if ($module) {
            $this->setNamespace($module . '\\' . AbstractCodeGenerator::NAMESPACE_CONTROLLER);
        }
        if ($parentClassNamespace) {
            $this->setUse($this->getNamespace() . '\\' . $parentClassNamespace . '\\' . $className, 'BaseClass');
            $ClassGenerator->setExtendedClass('BaseClass');
        }
        $this->setBody($ClassGenerator->generate());
    }

}