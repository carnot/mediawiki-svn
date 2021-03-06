<%--
	search: Search for pages.
--%>
<%@ include file="header.jsp" %>
<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core" %>
<%@ taglib prefix="scav" uri="scavenger" %>

<h1 class="title">Search</h1>

<c:choose>
<c:when test="${empty hits}">
	<p>The page you searched for does not exist.</p>
</c:when>

<c:otherwise>
	<ul class="searchresults">
	<c:forEach items="${hits}" var="hit">
		<scav:page var="url" action="view" name="${hit.title.text}" />
		
		<li>
		<span class="searchtitle">
			<a href="${url}"><c:out value="${hit.title.text}"/></a>
		</span>
		<div class="searchbody">
			${hit.context}
		</div>
		</li>
	</c:forEach>
	</ul>
</c:otherwise>
</c:choose>

<%@ include file="footer.jsp" %>
