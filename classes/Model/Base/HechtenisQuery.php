<?php

namespace Model\Custom\NovumJenv\Base;

use \Exception;
use \PDO;
use Model\Custom\NovumJenv\Hechtenis as ChildHechtenis;
use Model\Custom\NovumJenv\HechtenisQuery as ChildHechtenisQuery;
use Model\Custom\NovumJenv\Map\HechtenisTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'hechtenis' table.
 *
 *
 *
 * @method     ChildHechtenisQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildHechtenisQuery orderByPersoonId($order = Criteria::ASC) Order by the persoon_id column
 * @method     ChildHechtenisQuery orderByInHechtenis($order = Criteria::ASC) Order by the in_hechtenis column
 * @method     ChildHechtenisQuery orderByEindDatum($order = Criteria::ASC) Order by the eind_datum column
 *
 * @method     ChildHechtenisQuery groupById() Group by the id column
 * @method     ChildHechtenisQuery groupByPersoonId() Group by the persoon_id column
 * @method     ChildHechtenisQuery groupByInHechtenis() Group by the in_hechtenis column
 * @method     ChildHechtenisQuery groupByEindDatum() Group by the eind_datum column
 *
 * @method     ChildHechtenisQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildHechtenisQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildHechtenisQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildHechtenisQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildHechtenisQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildHechtenisQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildHechtenisQuery leftJoinPersoon($relationAlias = null) Adds a LEFT JOIN clause to the query using the Persoon relation
 * @method     ChildHechtenisQuery rightJoinPersoon($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Persoon relation
 * @method     ChildHechtenisQuery innerJoinPersoon($relationAlias = null) Adds a INNER JOIN clause to the query using the Persoon relation
 *
 * @method     ChildHechtenisQuery joinWithPersoon($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Persoon relation
 *
 * @method     ChildHechtenisQuery leftJoinWithPersoon() Adds a LEFT JOIN clause and with to the query using the Persoon relation
 * @method     ChildHechtenisQuery rightJoinWithPersoon() Adds a RIGHT JOIN clause and with to the query using the Persoon relation
 * @method     ChildHechtenisQuery innerJoinWithPersoon() Adds a INNER JOIN clause and with to the query using the Persoon relation
 *
 * @method     \Model\Custom\NovumJenv\PersoonQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildHechtenis findOne(ConnectionInterface $con = null) Return the first ChildHechtenis matching the query
 * @method     ChildHechtenis findOneOrCreate(ConnectionInterface $con = null) Return the first ChildHechtenis matching the query, or a new ChildHechtenis object populated from the query conditions when no match is found
 *
 * @method     ChildHechtenis findOneById(int $id) Return the first ChildHechtenis filtered by the id column
 * @method     ChildHechtenis findOneByPersoonId(int $persoon_id) Return the first ChildHechtenis filtered by the persoon_id column
 * @method     ChildHechtenis findOneByInHechtenis(string $in_hechtenis) Return the first ChildHechtenis filtered by the in_hechtenis column
 * @method     ChildHechtenis findOneByEindDatum(string $eind_datum) Return the first ChildHechtenis filtered by the eind_datum column *

 * @method     ChildHechtenis requirePk($key, ConnectionInterface $con = null) Return the ChildHechtenis by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHechtenis requireOne(ConnectionInterface $con = null) Return the first ChildHechtenis matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildHechtenis requireOneById(int $id) Return the first ChildHechtenis filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHechtenis requireOneByPersoonId(int $persoon_id) Return the first ChildHechtenis filtered by the persoon_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHechtenis requireOneByInHechtenis(string $in_hechtenis) Return the first ChildHechtenis filtered by the in_hechtenis column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildHechtenis requireOneByEindDatum(string $eind_datum) Return the first ChildHechtenis filtered by the eind_datum column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildHechtenis[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildHechtenis objects based on current ModelCriteria
 * @method     ChildHechtenis[]|ObjectCollection findById(int $id) Return ChildHechtenis objects filtered by the id column
 * @method     ChildHechtenis[]|ObjectCollection findByPersoonId(int $persoon_id) Return ChildHechtenis objects filtered by the persoon_id column
 * @method     ChildHechtenis[]|ObjectCollection findByInHechtenis(string $in_hechtenis) Return ChildHechtenis objects filtered by the in_hechtenis column
 * @method     ChildHechtenis[]|ObjectCollection findByEindDatum(string $eind_datum) Return ChildHechtenis objects filtered by the eind_datum column
 * @method     ChildHechtenis[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class HechtenisQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Model\Custom\NovumJenv\Base\HechtenisQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'hurah', $modelName = '\\Model\\Custom\\NovumJenv\\Hechtenis', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildHechtenisQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildHechtenisQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildHechtenisQuery) {
            return $criteria;
        }
        $query = new ChildHechtenisQuery();
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
     * @return ChildHechtenis|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(HechtenisTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = HechtenisTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildHechtenis A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, persoon_id, in_hechtenis, eind_datum FROM hechtenis WHERE id = :p0';
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
            /** @var ChildHechtenis $obj */
            $obj = new ChildHechtenis();
            $obj->hydrate($row);
            HechtenisTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildHechtenis|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildHechtenisQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(HechtenisTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildHechtenisQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(HechtenisTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildHechtenisQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(HechtenisTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(HechtenisTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HechtenisTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the persoon_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPersoonId(1234); // WHERE persoon_id = 1234
     * $query->filterByPersoonId(array(12, 34)); // WHERE persoon_id IN (12, 34)
     * $query->filterByPersoonId(array('min' => 12)); // WHERE persoon_id > 12
     * </code>
     *
     * @see       filterByPersoon()
     *
     * @param     mixed $persoonId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHechtenisQuery The current query, for fluid interface
     */
    public function filterByPersoonId($persoonId = null, $comparison = null)
    {
        if (is_array($persoonId)) {
            $useMinMax = false;
            if (isset($persoonId['min'])) {
                $this->addUsingAlias(HechtenisTableMap::COL_PERSOON_ID, $persoonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($persoonId['max'])) {
                $this->addUsingAlias(HechtenisTableMap::COL_PERSOON_ID, $persoonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HechtenisTableMap::COL_PERSOON_ID, $persoonId, $comparison);
    }

    /**
     * Filter the query on the in_hechtenis column
     *
     * Example usage:
     * <code>
     * $query->filterByInHechtenis('fooValue');   // WHERE in_hechtenis = 'fooValue'
     * $query->filterByInHechtenis('%fooValue%', Criteria::LIKE); // WHERE in_hechtenis LIKE '%fooValue%'
     * </code>
     *
     * @param     string $inHechtenis The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHechtenisQuery The current query, for fluid interface
     */
    public function filterByInHechtenis($inHechtenis = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($inHechtenis)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HechtenisTableMap::COL_IN_HECHTENIS, $inHechtenis, $comparison);
    }

    /**
     * Filter the query on the eind_datum column
     *
     * Example usage:
     * <code>
     * $query->filterByEindDatum('2011-03-14'); // WHERE eind_datum = '2011-03-14'
     * $query->filterByEindDatum('now'); // WHERE eind_datum = '2011-03-14'
     * $query->filterByEindDatum(array('max' => 'yesterday')); // WHERE eind_datum > '2011-03-13'
     * </code>
     *
     * @param     mixed $eindDatum The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildHechtenisQuery The current query, for fluid interface
     */
    public function filterByEindDatum($eindDatum = null, $comparison = null)
    {
        if (is_array($eindDatum)) {
            $useMinMax = false;
            if (isset($eindDatum['min'])) {
                $this->addUsingAlias(HechtenisTableMap::COL_EIND_DATUM, $eindDatum['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($eindDatum['max'])) {
                $this->addUsingAlias(HechtenisTableMap::COL_EIND_DATUM, $eindDatum['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HechtenisTableMap::COL_EIND_DATUM, $eindDatum, $comparison);
    }

    /**
     * Filter the query by a related \Model\Custom\NovumJenv\Persoon object
     *
     * @param \Model\Custom\NovumJenv\Persoon|ObjectCollection $persoon The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildHechtenisQuery The current query, for fluid interface
     */
    public function filterByPersoon($persoon, $comparison = null)
    {
        if ($persoon instanceof \Model\Custom\NovumJenv\Persoon) {
            return $this
                ->addUsingAlias(HechtenisTableMap::COL_PERSOON_ID, $persoon->getId(), $comparison);
        } elseif ($persoon instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(HechtenisTableMap::COL_PERSOON_ID, $persoon->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByPersoon() only accepts arguments of type \Model\Custom\NovumJenv\Persoon or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Persoon relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildHechtenisQuery The current query, for fluid interface
     */
    public function joinPersoon($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Persoon');

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
            $this->addJoinObject($join, 'Persoon');
        }

        return $this;
    }

    /**
     * Use the Persoon relation Persoon object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Model\Custom\NovumJenv\PersoonQuery A secondary query class using the current class as primary query
     */
    public function usePersoonQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPersoon($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Persoon', '\Model\Custom\NovumJenv\PersoonQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildHechtenis $hechtenis Object to remove from the list of results
     *
     * @return $this|ChildHechtenisQuery The current query, for fluid interface
     */
    public function prune($hechtenis = null)
    {
        if ($hechtenis) {
            $this->addUsingAlias(HechtenisTableMap::COL_ID, $hechtenis->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the hechtenis table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(HechtenisTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            HechtenisTableMap::clearInstancePool();
            HechtenisTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(HechtenisTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(HechtenisTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            HechtenisTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            HechtenisTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // HechtenisQuery
