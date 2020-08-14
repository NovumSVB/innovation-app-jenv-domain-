<?php

namespace Model\Custom\NovumJenv\Base;

use \Exception;
use \PDO;
use Model\Custom\NovumJenv\Persoon as ChildPersoon;
use Model\Custom\NovumJenv\PersoonQuery as ChildPersoonQuery;
use Model\Custom\NovumJenv\Map\PersoonTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'persoon' table.
 *
 *
 *
 * @method     ChildPersoonQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildPersoonQuery orderByBsn($order = Criteria::ASC) Order by the bsn column
 *
 * @method     ChildPersoonQuery groupById() Group by the id column
 * @method     ChildPersoonQuery groupByBsn() Group by the bsn column
 *
 * @method     ChildPersoonQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildPersoonQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildPersoonQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildPersoonQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildPersoonQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildPersoonQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildPersoonQuery leftJoinHechtenis($relationAlias = null) Adds a LEFT JOIN clause to the query using the Hechtenis relation
 * @method     ChildPersoonQuery rightJoinHechtenis($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Hechtenis relation
 * @method     ChildPersoonQuery innerJoinHechtenis($relationAlias = null) Adds a INNER JOIN clause to the query using the Hechtenis relation
 *
 * @method     ChildPersoonQuery joinWithHechtenis($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Hechtenis relation
 *
 * @method     ChildPersoonQuery leftJoinWithHechtenis() Adds a LEFT JOIN clause and with to the query using the Hechtenis relation
 * @method     ChildPersoonQuery rightJoinWithHechtenis() Adds a RIGHT JOIN clause and with to the query using the Hechtenis relation
 * @method     ChildPersoonQuery innerJoinWithHechtenis() Adds a INNER JOIN clause and with to the query using the Hechtenis relation
 *
 * @method     ChildPersoonQuery leftJoinVoorlopigeHechtenis($relationAlias = null) Adds a LEFT JOIN clause to the query using the VoorlopigeHechtenis relation
 * @method     ChildPersoonQuery rightJoinVoorlopigeHechtenis($relationAlias = null) Adds a RIGHT JOIN clause to the query using the VoorlopigeHechtenis relation
 * @method     ChildPersoonQuery innerJoinVoorlopigeHechtenis($relationAlias = null) Adds a INNER JOIN clause to the query using the VoorlopigeHechtenis relation
 *
 * @method     ChildPersoonQuery joinWithVoorlopigeHechtenis($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the VoorlopigeHechtenis relation
 *
 * @method     ChildPersoonQuery leftJoinWithVoorlopigeHechtenis() Adds a LEFT JOIN clause and with to the query using the VoorlopigeHechtenis relation
 * @method     ChildPersoonQuery rightJoinWithVoorlopigeHechtenis() Adds a RIGHT JOIN clause and with to the query using the VoorlopigeHechtenis relation
 * @method     ChildPersoonQuery innerJoinWithVoorlopigeHechtenis() Adds a INNER JOIN clause and with to the query using the VoorlopigeHechtenis relation
 *
 * @method     \Model\Custom\NovumJenv\HechtenisQuery|\Model\Custom\NovumJenv\VoorlopigeHechtenisQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildPersoon findOne(ConnectionInterface $con = null) Return the first ChildPersoon matching the query
 * @method     ChildPersoon findOneOrCreate(ConnectionInterface $con = null) Return the first ChildPersoon matching the query, or a new ChildPersoon object populated from the query conditions when no match is found
 *
 * @method     ChildPersoon findOneById(int $id) Return the first ChildPersoon filtered by the id column
 * @method     ChildPersoon findOneByBsn(string $bsn) Return the first ChildPersoon filtered by the bsn column *

 * @method     ChildPersoon requirePk($key, ConnectionInterface $con = null) Return the ChildPersoon by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPersoon requireOne(ConnectionInterface $con = null) Return the first ChildPersoon matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPersoon requireOneById(int $id) Return the first ChildPersoon filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPersoon requireOneByBsn(string $bsn) Return the first ChildPersoon filtered by the bsn column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPersoon[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildPersoon objects based on current ModelCriteria
 * @method     ChildPersoon[]|ObjectCollection findById(int $id) Return ChildPersoon objects filtered by the id column
 * @method     ChildPersoon[]|ObjectCollection findByBsn(string $bsn) Return ChildPersoon objects filtered by the bsn column
 * @method     ChildPersoon[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class PersoonQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Model\Custom\NovumJenv\Base\PersoonQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'hurah', $modelName = '\\Model\\Custom\\NovumJenv\\Persoon', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildPersoonQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildPersoonQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildPersoonQuery) {
            return $criteria;
        }
        $query = new ChildPersoonQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildPersoon|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(PersoonTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = PersoonTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildPersoon A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, bsn FROM persoon WHERE id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildPersoon $obj */
            $obj = new ChildPersoon();
            $obj->hydrate($row);
            PersoonTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildPersoon|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildPersoonQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PersoonTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildPersoonQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PersoonTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPersoonQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(PersoonTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(PersoonTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersoonTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the bsn column
     *
     * Example usage:
     * <code>
     * $query->filterByBsn('fooValue');   // WHERE bsn = 'fooValue'
     * $query->filterByBsn('%fooValue%', Criteria::LIKE); // WHERE bsn LIKE '%fooValue%'
     * </code>
     *
     * @param     string $bsn The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPersoonQuery The current query, for fluid interface
     */
    public function filterByBsn($bsn = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bsn)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersoonTableMap::COL_BSN, $bsn, $comparison);
    }

    /**
     * Filter the query by a related \Model\Custom\NovumJenv\Hechtenis object
     *
     * @param \Model\Custom\NovumJenv\Hechtenis|ObjectCollection $hechtenis the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPersoonQuery The current query, for fluid interface
     */
    public function filterByHechtenis($hechtenis, $comparison = null)
    {
        if ($hechtenis instanceof \Model\Custom\NovumJenv\Hechtenis) {
            return $this
                ->addUsingAlias(PersoonTableMap::COL_ID, $hechtenis->getPersoonId(), $comparison);
        } elseif ($hechtenis instanceof ObjectCollection) {
            return $this
                ->useHechtenisQuery()
                ->filterByPrimaryKeys($hechtenis->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByHechtenis() only accepts arguments of type \Model\Custom\NovumJenv\Hechtenis or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Hechtenis relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPersoonQuery The current query, for fluid interface
     */
    public function joinHechtenis($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Hechtenis');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Hechtenis');
        }

        return $this;
    }

    /**
     * Use the Hechtenis relation Hechtenis object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Model\Custom\NovumJenv\HechtenisQuery A secondary query class using the current class as primary query
     */
    public function useHechtenisQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinHechtenis($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Hechtenis', '\Model\Custom\NovumJenv\HechtenisQuery');
    }

    /**
     * Filter the query by a related \Model\Custom\NovumJenv\VoorlopigeHechtenis object
     *
     * @param \Model\Custom\NovumJenv\VoorlopigeHechtenis|ObjectCollection $voorlopigeHechtenis the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPersoonQuery The current query, for fluid interface
     */
    public function filterByVoorlopigeHechtenis($voorlopigeHechtenis, $comparison = null)
    {
        if ($voorlopigeHechtenis instanceof \Model\Custom\NovumJenv\VoorlopigeHechtenis) {
            return $this
                ->addUsingAlias(PersoonTableMap::COL_ID, $voorlopigeHechtenis->getPersoonId(), $comparison);
        } elseif ($voorlopigeHechtenis instanceof ObjectCollection) {
            return $this
                ->useVoorlopigeHechtenisQuery()
                ->filterByPrimaryKeys($voorlopigeHechtenis->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByVoorlopigeHechtenis() only accepts arguments of type \Model\Custom\NovumJenv\VoorlopigeHechtenis or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the VoorlopigeHechtenis relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPersoonQuery The current query, for fluid interface
     */
    public function joinVoorlopigeHechtenis($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('VoorlopigeHechtenis');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'VoorlopigeHechtenis');
        }

        return $this;
    }

    /**
     * Use the VoorlopigeHechtenis relation VoorlopigeHechtenis object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Model\Custom\NovumJenv\VoorlopigeHechtenisQuery A secondary query class using the current class as primary query
     */
    public function useVoorlopigeHechtenisQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVoorlopigeHechtenis($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'VoorlopigeHechtenis', '\Model\Custom\NovumJenv\VoorlopigeHechtenisQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildPersoon $persoon Object to remove from the list of results
     *
     * @return $this|ChildPersoonQuery The current query, for fluid interface
     */
    public function prune($persoon = null)
    {
        if ($persoon) {
            $this->addUsingAlias(PersoonTableMap::COL_ID, $persoon->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the persoon table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PersoonTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            PersoonTableMap::clearInstancePool();
            PersoonTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PersoonTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(PersoonTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            PersoonTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            PersoonTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // PersoonQuery
