<?php
namespace BS\CLI\Model\CodeGenerator\Test;


use Camel\CaseTransformer;
use Camel\Format\SnakeCase;
use Camel\Format\StudlyCaps;
use BS\CLI\Model\AbstractCodeGenerator;
use BS\CLI\Model\CodeGenerator\AbstractFileGenerator;
use Zend\Code\Generator\ClassGenerator;
use Zend\Db\Metadata\Object\TableObject;

class SubModuleSubModel extends AbstractFileGenerator
{
    public function __construct(TableObject $table, $module = null, $parentClassNamespace = null)
    {
        parent::__construct();

        $this->table = $table;
        $Transformer = new CaseTransformer(new SnakeCase(), new StudlyCaps());
        $className   = $Transformer->transform($this->table->getName()) . 'Test';
        $this->setFilename($className);

        $ClassGenerator = new ClassGenerator($className);

        if ($module) {
            $this->setNamespace($module . '\\' . AbstractCodeGenerator::NAMESPACE_TEST . '\\' .
                                AbstractCodeGenerator::NAMESPACE_MODEL);
        }
        if ($parentClassNamespace) {
            $this->setUse($parentClassNamespace . '\\' . AbstractCodeGenerator::NAMESPACE_TEST .
                          '\\' . AbstractCodeGenerator::NAMESPACE_MODEL . '\\' . $className, 'BaseClass');
            $ClassGenerator->setExtendedClass('BaseClass');
        }
        $this->setBody($ClassGenerator->generate());
    }

}